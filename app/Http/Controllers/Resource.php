<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Resource extends Controller
{
    public function main()
    {
        return view('resources', [
            'resources' => \App\Models\Resource::query()->where('user_id', auth()->id())->paginate(10)
        ]);
    }

    public function search()
    {
        return view('resourcesearch');
    }

    public function searchresults()
    {

    }

    public function results()
    {

    }

    public function create() // GET
    {

    }

    public function store() // POST
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}