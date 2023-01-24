<?php

namespace App\Http\Controllers;

use App\Models\Auditory;
use Illuminate\Http\Request;

class AuditoryController extends Controller
{

    public function saveAuditory(Request $request)
    {
        $userOwner = $request->user()->id;
        $auditory = new Auditory;

        $toUpdateAuditory = $auditory::where('date', $request['date'])
            ->where('street', $request['street'])
            ->where('status', '!=', 99)
            ->where('user_id', $userOwner)
            ->first();

        if (isset($toUpdateAuditory)) {
            return abort(409, 'Ya existe una auditoría con esa calle y esa fecha');
        }

        $auditoryResult = $auditory::create([
            'date' => $request['date'],
            'street' => $request['street'],
            'street_type' => $request['street_type'],
            'street_way' => $request['street_way'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
            'status' => 1,
            'user_id' => $userOwner,
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'id' => $auditoryResult['id'],
            ]
        ], 200);
    }

    public function updateAuditory(Request $request, $id) {
        $userOwner = $request->user()->id;
        $auditory = new Auditory;

        $toUpdateAuditory = $auditory::where('id', $id)
            ->where('status', '!=', 99)
            ->where('user_id', $userOwner)
            ->first();

        if (!isset($toUpdateAuditory)) {
            return abort(409, 'No se encotnró la auditoría');
        }

        $auditoryResult = $toUpdateAuditory->fill([
            'date' => $request['date'],
            'street' => $request['street'],
            'street_type' => $request['street_type'],
            'street_way' => $request['street_way'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
        ])->save();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function getAuditoriesList(Request $request)
    {
        $userOwner = $request->user()->id;
        $auditory = new Auditory;

        $auditoryResult = $auditory::where('user_id', $userOwner)
            ->where('status', '!=', 99)
            ->select(
                'id',
                'date',
                'street',
            )
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryResult,
        ], 200);
    }

    public function getAuditoriesCount(Request $request)
    {
        $userOwner = $request->user()->id;
        $auditory = new Auditory;

        $auditoryResult = $auditory::where('user_id', $userOwner)
            ->where('status', '!=', 99)
            ->count();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryResult,
        ], 200);
    }

    public function getForm(Request $request, $id)
    {
        $userOwner = $request->user()->id;
        $auditory = new Auditory;

        $auditoryResult = $auditory::where('id', $id)
            ->where('user_id', $userOwner)
            ->where('status', '!=', 99)
            ->select(
                'id',
                'date',
                'street',
                'street_type as type',
                'street_way as way',
                'lat',
                'lng',
            )
            ->first();

        if (!isset($auditoryResult)) {
            return abort(409, 'No se encotnró la auditoría');
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryResult,
        ], 200);
    }

}
