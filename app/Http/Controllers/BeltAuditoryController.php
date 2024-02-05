<?php

namespace App\Http\Controllers;

use App\Models\beltAuditory;
use App\Models\beltAuditoryCouht;
use App\Models\beltAuditoryEvidence;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BeltAuditoryController extends Controller
{

    // Web Panel

    public function getPaginatedList(Request $request)
    {
        $pageSize = $request['page_size'];
        $pageIndex = $request['page_index'];
        $orderColumn = $request['order_column'];
        $orderDirection = $request['order_direction'];
        $searchKey = $request['search_key'];

        $havingQuery = '';

        $hasSeachKey = $searchKey != '!';

        if ($hasSeachKey) {
            $havingQuery = ' WHERE ';

            $stringConnector = '';

            $havingQuery .= $stringConnector . '(title like "%' . $searchKey . '%") '; // description, user
        }


        $total = 0;
        $queryRes = null;

        $orderPageQuery = ' ORDER BY ' . $orderColumn . ' ' . $orderDirection . '
            LIMIT ' . $pageSize . '
            OFFSET ' . $pageSize * $pageIndex . ';';

        $query = 'SELECT
            a.id,
            a.title,
            a.description,
            a.date,
            a.time,
            a.lat,
            a.lng,
            u.name as user
        FROM belt_auditory a
        JOIN users u ON u.id = a.user_id';

        $pageQuery = $query . $havingQuery . $orderPageQuery;
        $totalQuery = $query . $havingQuery;

        $queryRes = DB::select($pageQuery);
        $total = count(DB::select($totalQuery));

        return [
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'list' => $queryRes,
                'total' => $total,
            ],
        ];
    }

    public function getWebDetail(Request $request, $id)
    {

        $auditory = new BeltAuditory;
        $auditoryRes = $auditory::where('id', $id)
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

        $auditoryEvidence = new BeltAuditoryEvidence;

        $auditoryRes['evidences'] = $auditoryEvidence::where('belt_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();


        $counts = new beltAuditoryCouht;
        $auditoryRes['counts'] = $counts::where('belt_auditory_id', $id)
            ->select(
                'adults_count',
                'belts_count',
                'chairs_count',
            )
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryRes,
        ]);
    }

    public function downloadWebPdf(Request $request, $id)
    {
        $auditory = new BeltAuditory;
        $auditoryRes = $auditory::where('id', $id)
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
                'user_id',
            )
            ->first();

        if (!isset($auditoryRes)) {
            return abort(409, 'No se encontró la auditoría');
        }

        $userOwner = $auditoryRes['user_id'];

        $auditoryEvidence = new BeltAuditoryEvidence;

        $auditoryEvidenceRes = $auditoryEvidence::where('belt_auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/belt/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

        $count = new beltAuditoryCouht;
        $countRes = $count::where('belt_auditory_id', $id)
            ->select(
                'adults_count',
                'belts_count',
                'chairs_count',
            )
            ->get();

        foreach ($countRes as $count) {
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

        $pdf = Pdf::loadView('downloads.belt-auditory-download', compact('data'));
        return $pdf->download('auditoría.pdf');
    }

    // Mobile App

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
            ->orderBy('id', 'desc')
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
                'adults_count',
                'belts_count',
                'chairs_count',
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
        $countRes = $count::where('belt_auditory_id', $id)
            ->select(

                'adults_count',
                'belts_count',
                'chairs_count',
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
        if (!file_exists($request->file('image'))) {
            return response()->json([
                'code' => 409,
                'message' => 'No se recibió el archivo',
                'data' => $request->all(),
                'file' => $request->file('image')->getClientOriginalName()
            ], 409);
        }
        $newDir = $request['belt_auditory_id'] . '-' . $request['dir'];
        $completeDir = 'belt/' . $newDir . '.jpeg';

        if (!Storage::disk('public')->put($completeDir, base64_decode($request['image']))) {
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
