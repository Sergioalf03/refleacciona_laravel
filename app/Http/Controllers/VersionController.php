<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Section;
use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{

    public function getLastVersion()
    {
        $version = new Version;
        $versionRes = $version::select(
                'name',
                'number',
            )
            ->orderBy('id', 'desc')
            ->first();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $versionRes,
        ], 200);
    }

    public function getNewRows() {
        $version = new Version;
        $versionRes = $version::select(
                'number',
            )
            ->orderBy('id', 'desc')
            ->first();

        $section = new Section;
        $sectionResult = $section::where('version', $versionRes['number'])
            ->get();

        $question = new Question;
        $questionResult = $question::where('version', $versionRes['number'])
            ->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'questions' => $questionResult,
                'sections' => $sectionResult,
            ],
        ], 200);
    }

    public function createVersion(Request $request)
    {
        $version = new Version;
        $version::create($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function getList(Request $request)
    {
        $version = new Version;
        $version::orderBy('id', 'desc')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }
}
