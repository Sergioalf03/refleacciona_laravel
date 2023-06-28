<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getList(Request $request)
    {
        $section = new Section;
        $sectionResult = $section::ordenBy('indx', 'asc')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $sectionResult,
        ]);
    }

    public function getOneById(Request $request, $id)
    {
        $section = new Section;
        $sectionResult = $section::where('id', $id)->first();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $sectionResult,
        ]);
    }

    public function create(Request $request)
    {
        $section = new Section;
        $sectionResult = $section::create($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => ['id' => $sectionResult['id']],
        ]);
    }

    public function update(Request $request, $id)
    {
        $section = new Section;
        $sectionResult = $section::where('id', $id)->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ]);
    }

    public function delete(Request $request, $id)
    {
        $section = new Section;
        $sectionResult = $section::where('id', $id)->update(['status' => 99]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ]);
    }
}
