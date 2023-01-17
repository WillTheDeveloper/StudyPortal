<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Uid\Uuid;

class Resource extends Controller
{
    public function main()
    {
        return view('resources.index', [
            'resources' => \App\Models\Resource::query()->where('user_id', auth()->id())->paginate(10)
        ]);
    }

    public function search()
    {
        return view('resources.search');
    }

    public function myresourceresults()
    {
        return view('resources.results', [
            'results' => \App\Models\Resource::search(request()->input('search'))
                ->where('user_id', auth()->id())
                ->paginate(10)
        ]);
    }

    public function results()
    {
        return view('resources.results', [
            'results' => \App\Models\Resource::search(request()->input('search'))
                ->where('private', false)
                ->paginate(10)
        ]);
    }

    public function create() // GET
    {
        return view('resources.new', [
            'labels' => Label::query()->where('user_id', auth()->id())->get(),
            'subject' => Subject::query()->get(),
        ]);
    }

    public function store(Request $request) // POST
    {
        $name = Uuid::v6();

//        dd($request->input('file-upload'), $name);

        $path = Storage::putFileAs('./', $request->input('file-upload'), $name);

        /*$id = \App\Models\Resource::query()->create([
            'title' => 'test',
            'description' => 'test description',
            's3_url' => $path,
            'user_id' => auth()->id(),
            'label_id' => null,
            'subject_id' => 1,
        ]);*/

        return redirect(route('resources'));

//        return redirect(route('resource.id', $id->id));
    }

    public function show($id)
    {
        return view('resources.show', [
            'resource' => \App\Models\Resource::query()->find($id)
        ]);
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}
