<?php

namespace App\Http\Controllers;

use App\Models\HelmetAuditory;
use App\Models\HelmetAuditoryCount;
use App\Models\HelmetAuditoryEvidence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class HelmetAuditoryController extends Controller
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
        FROM helmet_auditory a
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

        $auditory = new HelmetAuditory;
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

    public function downloadWebPdf(Request $request, $id)
    {
        $auditory = new HelmetAuditory;
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
        $countRes = $count::where('helmet_auditory_id', $id)
            ->select(
                'origin',
                'destination',
                'users_count',
                'helmets_count',
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

        $pdf = Pdf::loadView('downloads.helmet-auditory-donwload', compact('data'));
        return $pdf->download('auditoría.pdf');
    }

    // Mobile App

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
        $countRes = $count::where('helmet_auditory_id', $id)
            ->select(
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
        $id = $request->input('helmet_auditory_id');
        $name = $request->input('dir');
        $newDir = $id . '-' . $name;

        if (!$id) {
            return abort(409, 'Sin id ' . $id);
        }
        if (!$name) {
            return abort(409, 'Sin nombre ' . $name);
        }
        if (!$request->has('image')) {
            return abort(409, 'Sin imágen');
        }

        try {
            if (!Storage::disk('public')->put('helmet/' . $newDir . '.jpeg', file_get_contents($request->input('image')))) {
                return abort(409, 'No se pudo guardar la imagen');
            };
        } catch (\Exception $e) {
            return abort(409, 'Error al procesar la solicitud');
        }

        $auditoryEvidence = new HelmetAuditoryEvidence;
        $auditoryEvidenceRes = $auditoryEvidence::create([
            'dir' => $newDir,
            'creation_date' => $request['creation_date'],
            'helmet_auditory_id' => $id,
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
