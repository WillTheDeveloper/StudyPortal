<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewAssignment;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Assignment as Assign;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Assignment extends Controller
{
    public function manage($id)
    {
        return view('manageassignment', [
            'assignment' => Assign::all()->where('id', $id)->find($id)
        ]);
    }

    public function create()
    {
        return view('createassignment', [
            'subjects' => Subject::all(),
//            'tutors' => User::all()->where('is_tutor', 1),
            /*'students' => User::all()
                ->where('is_tutor', 0)
                ->where('is_banned', 0)
                ->where('is_admin', 0),*/
        ]);
    }

    public function new(CreateNewAssignment $request)
    {
        $assignment = new Assign(
            [
                'title' => $request->input('title'),
                'duedate' => $request->input('due-date'),
                'details' => $request->input('description'),
                'subject_id' => $request->input('subject-select'),
                'setdate' => now(),
            ]
        );
        $assignment->save();

        $array = $request->input(['group-select']); // Get the numbers from the select
        $assign = Assign::find($assignment->id); // Get the assignment that just got created

        $users = DB::table('group_user')
            ->where('group_id', $array)->get('user_id')->keyBy('user_id')->keys()->toArray();

        $assign->User()->attach($users);

        Http::post('https://discord.com/api/webhooks/914187384835420211/aUjMOW2HNugOC163Rf3ziggluhvTtzROxAoku9AWR258sGTf6Ec6u2DaOKTzx-G6hhTC', [
            'content' => "Assignment created.",
            'embeds' => [
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'color' => '7506394',
                    'url' => route('assignments.manage', $assignment->id),
                ]
            ],
        ]);

        return redirect('assignments');
    }

    public function delete($id, Request $request)
    {
        if ($request->user()->is_tutor) {
            Assign::query()->where('assignments.id', $id)->findOrFail($id)->delete();
            DB::table('assignment_user')->where('assignment_user.assignment_id', $id)->select('*')->delete();

            Http::post('https://discord.com/api/webhooks/914187384835420211/aUjMOW2HNugOC163Rf3ziggluhvTtzROxAoku9AWR258sGTf6Ec6u2DaOKTzx-G6hhTC', [
                'embeds' => [
                    [
                        'title' => 'Assignment deleted',
                        'description' => 'Test',
                        'color' => '7506394',
                        'url' => route('assignments'),
                    ]
                ],
            ]);
        }
        else {
            abort(401);
        }
        return redirect('assignments');
    }

    public function edit($id)
    {
        return view('editassignment', [
            'assignment' => Assign::query()->where('assignments.id', $id)->findOrFail($id),
            'subjects' => Subject::query()->get('subjects.subject')
        ]);
    }

    public function update(Request $request, $id)
    {
        Assign::all()->find($id)->update(
            [
                'subject_id' => $request->input('subject-select'),
                'title' => $request->input('title'),
                'details' => $request->input('details')
            ]
        );

        $assignment = \App\Models\Assignment::query()->where('assignments.id', $id)->find($id);

        Http::post('https://discord.com/api/webhooks/914187384835420211/aUjMOW2HNugOC163Rf3ziggluhvTtzROxAoku9AWR258sGTf6Ec6u2DaOKTzx-G6hhTC', [
            'content' => "Assignment updated.",
            'embeds' => [
                [
                    'title' => $assignment->title,
                    'description' => $assignment->details,
                    'color' => '7506394',
                    'url' => route('assignments.manage', $assignment->id),
                ]
            ],
        ]);

        return redirect(route('assignments.manage', $id));
    }
}
