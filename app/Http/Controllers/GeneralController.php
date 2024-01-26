<?php

namespace App\Http\Controllers;

use App\Models\Auditory;
use App\Models\beltAuditory;
use App\Models\GeneralCountAuditory;
use App\Models\HelmetAuditory;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function getAllLocations(Request $request) {
        $auditory = new Auditory;
        $auditoryRes = $auditory::select(
                'id',
                'title',
                'date',
                'lat',
                'lng',
                'status',
            )
            ->get();

        $belt = new beltAuditory;
        $beltRes = $belt::select(
                'id',
                'title',
                'date',
                'lat',
                'lng',
                'status',
            )
            ->get();

        $helmet = new HelmetAuditory;
        $helmetRes = $helmet::select(
                'id',
                'title',
                'date',
                'lat',
                'lng',
                'status',
            )
            ->get();

        $general = new GeneralCountAuditory;
        $generalRes = $general::select(
                'id',
                'title',
                'date',
                'lat',
                'lng',
                'status',
            )
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'auditory' => $auditoryRes,
                'belt' => $beltRes,
                'helmet' => $helmetRes,
                'general' => $generalRes
            ],
        ]);
    }

    public function getAuditoryLocations(Request $request, $date) {
        $auditory = new Auditory;
        $auditorQuery = $auditory::select(
                'id',
                'title',
                'date',
                'lat',
                'lng',
                'status',
        );

        $auditoryRes = null;

        if ($date == 'all') {
            $auditoryRes = $auditorQuery
                ->get();
        } else {
            $auditoryRes = $auditorQuery
                ->where('date', '>', $date)
                ->get();
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $auditoryRes,
        ]);
    }

    public function getHelmetLocations(Request $request, $date) {
        $helmet = new HelmetAuditory;
        $helmetQuery = $helmet::select(
            'id',
            'title',
            'date',
            'lat',
            'lng',
            'status',
        );

        $helmetRes = null;

        if ($date == 'all') {
            $helmetRes = $helmetQuery
                ->get();
        } else {
            $helmetRes = $helmetQuery
                ->where('date', '>', $date)
                ->get();
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $helmetRes,
        ]);
    }

    public function getBeltLocations(Request $request, $date) {
        $belt = new beltAuditory;
        $beltQuery = $belt::select(
            'id',
            'title',
            'date',
            'lat',
            'lng',
            'status',
        );

        $beltRes = null;

        if ($date == 'all') {
            $beltRes = $beltQuery
                ->get();
        } else {
            $beltRes = $beltQuery
                ->where('date', '>', $date)
                ->get();
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $beltRes,
        ]);
    }

    public function getGeneralLocations(Request $request, $date) {
        $general = new GeneralCountAuditory;
        $generalQuery = $general::select(
            'id',
            'title',
            'date',
            'lat',
            'lng',
            'status',
        );

        $generalRes = null;

        if ($date == 'all') {
            $generalRes = $generalQuery
                ->get();
        } else {
            $generalRes = $generalQuery
                ->where('date', '>', $date)
                ->get();
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $generalRes,
        ]);
    }

}
