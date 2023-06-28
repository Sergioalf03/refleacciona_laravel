<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getList(Request $request)
    {
        $question = new Question;
        $questionResult = $question::ordenBy('indx', 'asc')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $questionResult,
        ]);
    }

    public function getOneById(Request $request, $id)
    {
        $question = new Question;
        $questionResult = $question::where('id', $id)->first();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $questionResult,
        ]);
    }

    public function create(Request $request)
    {
        $question = new Question;
        $questionResult = $question::create($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => ['id' => $questionResult['id']],
        ]);
    }

    public function update(Request $request, $id)
    {
        $question = new Question;
        $questionResult = $question::where('id', $id)->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ]);
    }

    public function delete(Request $request, $id)
    {
        $question = new Question;
        $questionResult = $question::where('id', $id)->update(['status' => 99]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ]);
    }
}
