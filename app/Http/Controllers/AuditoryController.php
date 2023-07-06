<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerEvidence;
use App\Models\Auditory;
use App\Models\AuditoryEvidence;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuditoryController extends Controller
{

    public function getList(Request $request) {
        $userOwner = $request->user()->id;

        $auditory = new Auditory;
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

    public function getDetail(Request $request, $id) {
        $userOwner = $request->user()->id;

        $auditory = new Auditory;
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

        $auditoryEvidence = new AuditoryEvidence;

        $auditoryRes['evidences'] = $auditoryEvidence::where('auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $section = new Section;
        $sectionRes = $sectionRes = $section::select(
                'id',
                'uid',
                'name',
                'subname',
                'page',
                'indx',
                'status',
            )
            ->get();

        $answer = new Answer;

        foreach ($sectionRes as $key => $section) {
            $section['answers'] = $answer::join('questions as q', 'q.id', '=', 'answers.question_id')
                ->leftJoin('answer_evidence as ae', function ($join) use ($id) {
                    $join->on('ae.question_id', '=', 'answers.question_id');
                    $join->on('ae.auditory_id', '=', DB::raw($id));
                })
                ->where('q.section_id', $section['id'])
                ->where('answers.auditory_id', $id)
                ->select(
                    'answers.value as answer',
                    'answers.creation_date as date',
                    'q.uid',
                    'q.score',
                    'q.answers',
                    'q.sentence',
                    'q.indx',
                    'ae.dir',
                )
                ->get();
        }

        $filteredSections = array_filter($sectionRes->toArray(), function ($e) {
            return isset($e['answers']) && count($e['answers']) > 0;
        });

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'auditory' => $auditoryRes,
                'sections' => $filteredSections,
            ],
        ]);
    }

    public function import(Request $request) {
        $auditory = new Auditory;
        $auditoryRes = $auditory::create($request['auditory']);

        $answer = new Answer;
        foreach($request['answers'] as $toSaveAnswer) {
            $toSaveAnswer['auditory_id'] = $auditoryRes['id'];
            $answerRes = $answer::create($toSaveAnswer);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => ['id' => $auditoryRes['id']],
        ]);
    }

    public function uploadAuditoryEvidence(Request $request) {
        $newDir = $request['auditory_id'] . '-' . $request['dir'];

        if (!Storage::disk('public')->put('auditories/' . $newDir . '.jpeg', file_get_contents($request['image']))) {
            return abort(409, 'No se pudo guardar la imagen');
        };

        $auditoryEvidence = new AuditoryEvidence;
        $auditoryEvidenceRes = $auditoryEvidence::create([
            'dir' => $newDir,
            'creation_date' => $request['creation_date'],
            'auditory_id' => $request['auditory_id'],
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'id' => $auditoryEvidenceRes['id'],
            ],
        ], 200);
    }

    public function uploadAnswerEvidence(Request $request) {
        $dir = $request['auditory_id'] . '-' . $request['dir'];

        if (!Storage::disk('public')->put('answers/' . $dir . '.jpeg', file_get_contents($request['image']))) {
            return abort(409, 'No se pudo guardar la imagen');
        }

        $answerEvidence = new AnswerEvidence;
        $answerEvidenceRes = $answerEvidence::create([
            'dir' => $dir,
            'creation_date' => $request['creation_date'],
            'auditory_id' => $request['auditory_id'],
            'question_id' => $request['question_id'],
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => ['id' => $answerEvidenceRes['id']],
        ], 200);
    }

}
