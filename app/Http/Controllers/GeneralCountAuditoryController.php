<?php

namespace App\Http\Controllers;

use App\Models\GeneralCountAuditory;
use App\Models\GeneralCountAuditoryCount;
use App\Models\GeneralCountAuditoryEvidence;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralCountAuditoryController extends Controller
{
    public function getList(Request $request)
    {
        $userOwner = $request->user()->id;

        $auditory = new GeneralCountAuditory;
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

        $auditory = new GeneralCountAuditory;
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

        $auditoryEvidence = new GeneralCountAuditoryEvidence;

        $auditoryRes['evidences'] = $auditoryEvidence::where('gc_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $counts = new GeneralCountAuditoryCount;
        $auditoryRes['counts'] = $counts::where('general_count_auditory_id', $id)
            ->select(
                'id',
                'vehicle_type',
                'origin',
                'destination',
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

        $auditory = new GeneralCountAuditory;
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

        $auditoryEvidence = new GeneralCountAuditoryEvidence;

        $auditoryEvidenceRes = $auditoryEvidence::where('gc_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/general/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

        $count = new GeneralCountAuditoryCount;
        $countRes = $count::select(
            'vehicle_type',
            'origin',
            'destination',
        )
            ->get();

        foreach ($countRes as $count) {
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

        $pdf = Pdf::loadView('downloads.general-count-auditory-download', compact('data'));
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

    private function getDirection($index)
    {
        switch ($index) {
            case 1:
                return 'Noreste';
                break;
            case 2:
                return 'Norte';
                break;
            case 3:
                return 'Noroeste';
                break;
            case 4:
                return 'Este';
                break;
            case 5:
                return 'Oeste';
                break;
            case 6:
                return 'Sureste';
                break;
            case 7:
                return 'Sur';
                break;
            case 8:
                return 'Suroeste';
                break;
        }
    }

    private function getVehicleType($index)
    {
        switch ($index) {
            case 1:
                return 'automóvil';
                break;
            case 2:
                return 'pick-up';
                break;
            case 3:
                return 'minvan';
                break;
        }
    }

    public function import(Request $request)
    {
        $auditory = new GeneralCountAuditory;
        $auditoryRes = $auditory::create($request['auditory']);

        $answer = new GeneralCountAuditoryCount;
        foreach ($request['counts'] as $toSaveCount) {
            $toSaveCount['general_count_auditory_id'] = $auditoryRes['id'];
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
        $newDir = $request['gc_auditory_id'] . '-' . $request['dir'];

        if (!Storage::disk('public')->put('general/' . $newDir . '.jpeg', file_get_contents($request['image']))) {
            return abort(409, 'No se pudo guardar la imagen');
        };

        $auditoryEvidence = new GeneralCountAuditoryEvidence;
        $auditoryEvidenceRes = $auditoryEvidence::create([
            'dir' => $newDir,
            'creation_date' => $request['creation_date'],
            'gc_auditory_id' => $request['general_count_auditory_id'],
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
