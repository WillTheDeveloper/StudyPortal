<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportPost;
use App\Models\Post;
use Illuminate\Http\Request;

class Report extends Controller
{
    public function view($id)
    {
        return view('filereport', [
            'post' => Post::query()->find($id)
        ]);
    }

    public function resolve($id)
    {
        \App\Models\Report::query()->find($id)->update(
            [
                'resolved' => 1
            ]
        );

        return redirect(route('report.details', $id));
    }

    public function unresolve($id)
    {
        \App\Models\Report::query()->find($id)->update(
            [
                'resolved' => 0
            ]
        );

        return redirect(route('report.details', $id));
    }

    public function details($id)
    {
        return view('reports.details', [
            'data' => \App\Models\Report::query()->find($id)
        ]);
    }

    public function submit($id, ReportPost $request)
    {
        \App\Models\Report::query()->create(
            [
                'comment' => $request->input('info'),
                'reason' => $request->input('content'),
                'severity' => 'Low',
                'post_id' => $id,
                'user_id' => $request->user()->id
            ]
        )->save();

        return redirect(route('community', ['post' => $id]));
    }

    public function overview()
    {
        return view('reports.overview', [
            'reports' => \App\Models\Report::query()->orderByDesc('created_at')->paginate(10),
            'stats' => \App\Models\Report::query()->select('reports.resolved'),
        ]);
    }

    public function resolved()
    {
        return view('reports.resolved', [
            'reports' => \App\Models\Report::query()->where('reports.resolved', true)->paginate(10)
        ]);
    }

    public function unresolved()
    {
        return view('reports.unresolved', [
            'reports' => \App\Models\Report::query()->where('reports.resolved', false)->paginate(10)
        ]);
    }
}
