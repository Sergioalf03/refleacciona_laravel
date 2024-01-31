<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerEvidence;
use App\Models\Auditory;
use App\Models\AuditoryEvidence;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AuditoryController extends Controller
{

    // Web Panel

    public function getPaginatedList(Request $request) {
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
        FROM auditories a
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

        $auditory = new Auditory;
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

    public function downloadWebPdf(Request $request, $id)
    {
        $auditory = new Auditory;
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
                'user_id'
            )
            ->first();

        if (!isset($auditoryRes)) {
            return abort(409, 'No se encontró la auditoría');
        }

        $userOwner = $auditoryRes['user_id'];

        $auditoryEvidence = new AuditoryEvidence;

        $auditoryEvidenceRes = $auditoryEvidence::where('auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/auditories/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

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

        $yesCount = 0;
        $notCount = 0;

        $answer = new Answer;

        foreach ($sectionRes as $key => $section) {
            $answerRes = $answer::join('questions as q', 'q.id', '=', 'answers.question_id')
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

            $section['answers'] = array_map(function ($e) {
                if (isset($e['dir']) && $e['dir'] != null) {
                    $e['dir'] = 'storage/answers/' . $e['dir'] . '.jpeg';
                }

                if (str_starts_with($e['answers'], '[')) {
                    $answersArray = json_decode($e['answers']);

                    $e['formattedAnswer'] = null;
                    foreach ($answersArray as $ans) {
                        if ($ans->v == $e['answer']) {
                            $e['formattedAnswer'] = $ans->t;
                            break;
                        }
                    }

                    if ($e['formattedAnswer'] == null) {
                        $e['formattedAnswer'] = $e['answer'];
                    }
                } else {
                    $e['formattedAnswer'] = $e['answer'];
                }

                return $e;
            }, $answerRes->toArray());

            foreach ($section['answers'] as $ansr) {
                if ($ansr['score'] != '0') {
                    if ($ansr['answer'] == '1') {
                        $yesCount++;
                    } else {
                        $notCount++;
                    }
                }
            }
        }

        $filteredSections = array_filter($sectionRes->toArray(), function ($e) {
            return isset($e['answers']) && count($e['answers']) > 0;
        });

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
            'sections' => $filteredSections,
            'yesCount' => $yesCount,
            'notCount' => $notCount,
            'user' => $userRes,
        ];

        $pdf = Pdf::loadView('downloads.auditory-donwload', compact('data'));
        return $pdf->download('auditoría.pdf');
    }

    // Mobile App

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
            ->orderBy('id', 'desc')
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

    public function downloadPdf(Request $request, $id) {
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

        $auditoryEvidenceRes = $auditoryEvidence::where('auditory_id', $id)
            ->select(
                'dir'
            )
            ->get();

        $auditoryRes['evidences'] = array_map(function ($e) {
            return 'storage/auditories/' . $e['dir'] . '.jpeg';
        }, $auditoryEvidenceRes->toArray());

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

        $yesCount = 0;
        $notCount = 0;

        $answer = new Answer;

        foreach ($sectionRes as $key => $section) {
            $answerRes = $answer::join('questions as q', 'q.id', '=', 'answers.question_id')
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

            $section['answers'] = array_map(function ($e) {
                if (isset($e['dir']) && $e['dir'] != null) {
                    $e['dir'] = 'storage/answers/' . $e['dir'] . '.jpeg';
                }

                if (str_starts_with($e['answers'], '[')) {
                    $answersArray = json_decode($e['answers']);

                    $e['formattedAnswer'] = null;
                    foreach ($answersArray as $ans) {
                        if ($ans->v == $e['answer']) {
                            $e['formattedAnswer'] = $ans->t;
                            break;
                        }
                    }

                    if ($e['formattedAnswer'] == null) {
                        $e['formattedAnswer'] = $e['answer'];
                    }
                } else {
                    $e['formattedAnswer'] = $e['answer'];
                }

                return $e;
            }, $answerRes->toArray());

            foreach($section['answers'] as $ansr) {
                if ($ansr['score'] != '0') {
                    if ($ansr['answer'] == '1') {
                        $yesCount++;
                    } else {
                        $notCount++;
                    }
                }
            }
        }

        $filteredSections = array_filter($sectionRes->toArray(), function ($e) {
            return isset($e['answers']) && count($e['answers']) > 0;
        });

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
            'sections' => $filteredSections,
            'yesCount' => $yesCount,
            'notCount' => $notCount,
            'user' => $userRes,
        ];

        $pdf = Pdf::loadView('downloads.auditory-donwload', compact('data'));
        return $pdf->download('auditoría.pdf');
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
