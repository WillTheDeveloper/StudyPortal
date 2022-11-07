<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Institution extends Controller
{
    public function view()
    {
        return view('institutions',
        [
            'all' => \App\Models\Institution::query()->orderByDesc('institutions.institution')->paginate(25),
        ]);
    }

    public function manage($joincode)
    {
        return view('institutionmanage', [
            'institution' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function create()
    {
        return view('institutionnew');
    }

    public function submit(Request $request)
    {
        \App\Models\Institution::query()->create(
            [
                'joincode' => $request->input('joincode'),
                'institution' => $request->input('name'),
                'domain' => $request->input('domain'),
            ]
        )->save();

        return redirect(route('institution.edit', $request->input('joincode')));
    }

    public function update($joincode, Request $request)
    {
        $new = $request->input('joincode');

        $n = \App\Models\Institution::query()->where('joincode', $joincode)
            ->update([
                'institution' => $request->input('institution'),
                'joincode' => $new
            ]);

        return redirect(route('institution.manage'));
    }

    public function users($joincode)
    {
        return view('institutionusers', [
            'users' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function addUser($joincode) //🦆
    {
        return view('institutionadduser');
    }

    public function process($joincode, Request $request)
    {
        $email = $request->input('email');

        $user = \App\Models\User::query()->where('email', $email);

        $id = \App\Models\Institution::query()->where('joincode', $joincode)->get('id');

        if ($user->exists() and $user->get('users.institution_id') == null) {
            $user = \App\Models\User::all()->where('email', $email)->all();
            $user->Institution()->associate($id);
            $user->save();
        }
        else {
            abort(404, 'User not found');
        }
        return view(route('institution.users', $joincode));
    }

    public function requestDelete($joincode)
    {
        return view('requestinstitutiondelete', [
            'joincode' => $joincode
        ]);
    }

    public function deletedelete($joincode)
    {
        $institution = \App\Models\Institution::query()->where('joincode', $joincode)->get('id');

        foreach (\App\Models\User::query()->where('institution_id', $institution)->get('id') as $u)
        {
            $u->Instituion->dissociate($u);
            $u->save();
        }

        \App\Models\Institution::query()->where('joincode', $joincode)->delete();

        return redirect(route('institution.manage'));
    }
}
