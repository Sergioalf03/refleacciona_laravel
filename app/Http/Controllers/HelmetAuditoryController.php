<?php

namespace App\Http\Controllers;

use App\Models\HelmetAuditory;
use App\Models\HelmetAuditoryCount;
use App\Models\HelmetAuditoryEvidence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class HelmetAuditoryController extends Controller
{
    public function getList(Request $request)
    {
        $userOwner = $request->user()->id;

        $auditory = new HelmetAuditory;
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

        $auditory = new HelmetAuditory;
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

        $auditoryEvidence = new HelmetAuditoryEvidence;

        $auditoryRes['evidences'] = $auditoryEvidence::where('helmet_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();


        $counts = new HelmetAuditoryCount;
        $auditoryRes['counts'] = $counts::where('helmet_auditory_count.helmet_auditory_id', $id)
            ->select(
                'id',
                'origin',
                'destination',
                'users_count',
                'helmets_count',
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

        $auditory = new HelmetAuditory;
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

        $auditoryEvidence = new HelmetAuditoryEvidence;

        $auditoryEvidenceRes = $auditoryEvidence::where('helmet_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/helmet/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

        $count = new HelmetAuditoryCount;
        $countRes = $count::select(
                'origin',
                'destination',
                'users_count',
                'helmets_count',
            )
            ->get();

        foreach($countRes as $count) {
            $count['originText'] = $this->getDirection($count['origin']);
            $count['destinationText'] = $this->getDirection($count['destination']);
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

        $pdf = Pdf::loadView('downloads.helmet-auditory-donwload', compact('data'));
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

    public function import(Request $request)
    {
        $auditory = new HelmetAuditory;
        $auditoryRes = $auditory::create($request['auditory']);

        $answer = new HelmetAuditoryCount;
        foreach ($request['counts'] as $toSaveCount) {
            $toSaveCount['helmet_auditory_id'] = $auditoryRes['id'];
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
        $newDir = $request['helmet_auditory_id'] . '-' . $request['dir'];

        if (!Storage::disk('public')->put('helmet/' . $newDir . '.jpeg', file_get_contents($request['image']))) {
            return abort(409, 'No se pudo guardar la imagen');
        };

        $auditoryEvidence = new HelmetAuditoryEvidence;
        $auditoryEvidenceRes = $auditoryEvidence::create([
            'dir' => $newDir,
            'creation_date' => $request['creation_date'],
            'helmet_auditory_id' => $request['helmet_auditory_id'],
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
