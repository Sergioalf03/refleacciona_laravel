<?php

namespace App\Http\Controllers;

use App\Models\beltAuditory;
use App\Models\beltAuditoryCouht;
use App\Models\beltAuditoryEvidence;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeltAuditoryController extends Controller
{
    public function getList(Request $request)
    {
        $userOwner = $request->user()->id;

        $auditory = new beltAuditory;
        $auditoryRes = $auditory::where('user_id', $userOwner)
            ->select(
                'id',
                'title',
                'date',
                'status',
            )
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryRes,
        ]);
    }

    public function getDetail(Request $request, $id)
    {
        $userOwner = $request->user()->id;

        $auditory = new beltAuditory;
        $auditoryRes = $auditory::where('id', $id)
            ->where('user_id', $userOwner)
            ->select(
                'id',
                'title',
                'description',
                'close_note',
                'date',
                'time',
                'lat',
                'lng',
                'status',
                'creation_date',
                'update_date',
            )
            ->first();

        if (!isset($auditoryRes)) {
            return abort(409, 'No se encontró la auditoría');
        }

        $auditoryEvidence = new beltAuditoryEvidence;

        $auditoryRes['evidences'] = $auditoryEvidence::where('belt_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $counts = new beltAuditoryCouht;
        $auditoryRes['counts'] = $counts::where('belt_auditory_id', $id)
            ->select(
                'id',
                'vehicle_type',
                'origin',
                'destination',
                'adults_count',
                'belts_count',
                'child_count',
                'chairs_count',
                'coopilot',
                'overuse_count',
            )
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryRes,
        ]);
    }

    public function downloadPdf(Request $request, $id)
    {
        $userOwner = $request->user()->id;

        $auditory = new beltAuditory;
        $auditoryRes = $auditory::where('id', $id)
            ->where('user_id', $userOwner)
            ->select(
                'id',
                'title',
                'description',
                'close_note',
                'date',
                'time',
                'lat',
                'lng',
                'status',
                'creation_date',
                'update_date',
            )
            ->first();

        if (!isset($auditoryRes)) {
            return abort(409, 'No se encontró la auditoría');
        }

        $auditoryEvidence = new beltAuditoryEvidence;

        $auditoryEvidenceRes = $auditoryEvidence::where('belt_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/belt/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

        $count = new beltAuditoryCouht;
        $countRes = $count::select(
                'vehicle_type',
                'origin',
                'destination',
                'adults_count',
                'belts_count',
                'child_count',
                'chairs_count',
                'coopilot',
                'overuse_count',
            )
            ->get();

        foreach($countRes as $count) {
            $count['originText'] = $this->getDirection($count['origin']);
            $count['destinationText'] = $this->getDirection($count['destination']);
            $count['vehicleTypeText'] = $this->getVehicleType($count['vehicle_type']);
        }

        $user = new User;
        $userRes = $user::where('id', $userOwner)
            ->select(
                'name',
                'email',
                'phone_number',
            )
            ->first();

        $path = 'logo/' . $userOwner . '.jpeg';

        $userRes['logo'] = Storage::disk('public')->exists($path) ? ('storage/' . $path) : '';

        $data = [
            'auditory' => $auditoryRes,
            'count' => $countRes,
            'user' => $userRes,
        ];

        $pdf = Pdf::loadView('downloads.belt-auditory-download', compact('data'));
        return $pdf->download('auditoría.pdf');

        // return true;

        // return response()->json([
        //     'code' => 200,
        //     'message' => 'Success',
        //     'data' => [
        //         'auditory' => $auditoryRes,
        //         'sections' => $filteredSections,
        //         'yesCount' => $yesCount,
        //         'notCount' => $notCount,
        //     ],
        // ]);
    }

    private function getDirection($index) {
        switch ($index) {
            case 1: return 'Noreste'; break;
            case 2: return 'Norte'; break;
            case 3: return 'Noroeste'; break;
            case 4: return 'Este'; break;
            case 5: return 'Oeste'; break;
            case 6: return 'Sureste'; break;
            case 7: return 'Sur'; break;
            case 8: return 'Suroeste'; break;
        }
    }

    private function getVehicleType($index) {
        switch ($index) {
            case 1: return 'automóvil'; break;
            case 2: return 'pick-up'; break;
            case 3: return 'minvan'; break;
        }
    }

    public function import(Request $request)
    {
        $auditory = new beltAuditory;
        $auditoryRes = $auditory::create($request['auditory']);

        $answer = new beltAuditoryCouht;
        foreach ($request['counts'] as $toSaveCount) {
            $toSaveCount['belt_auditory_id'] = $auditoryRes['id'];
            $answerRes = $answer::create($toSaveCount);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => ['id' => $auditoryRes['id']],
        ]);
    }

    public function uploadAuditoryEvidence(Request $request)
    {
        $newDir = $request['belt_auditory_id'] . '-' . $request['dir'];

        if (!Storage::disk('public')->put('belt/' . $newDir . '.jpeg', file_get_contents($request['image']))) {
            return abort(409, 'No se pudo guardar la imagen');
        };

        $auditoryEvidence = new beltAuditoryEvidence;
        $auditoryEvidenceRes = $auditoryEvidence::create([
            'dir' => $newDir,
            'creation_date' => $request['creation_date'],
            'belt_auditory_id' => $request['belt_auditory_id'],
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'id' => $auditoryEvidenceRes['id'],
            ],
        ], 200);
    }
}
