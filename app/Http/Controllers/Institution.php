<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Institution extends Controller
{
    public function view()
    {
        $this->authorize('viewAny', \App\Models\Institution::class);

        return view('institutions.view',
        [
            'all' => \App\Models\Institution::query()->orderByDesc('institutions.institution')->paginate(25),
        ]);
    }

    public function manage($joincode)
    {
        $this->authorize('view', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.manage', [
            'institution' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function create()
    {
        $this->authorize('create', \App\Models\Institution::class);

        return view('institutions.new');
    }

    public function submit(Request $request)
    {
        $this->authorize('create', \App\Models\Institution::class);

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
        $this->authorize('update', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

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
        $this->authorize('view', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.users', [
            'users' => \App\Models\Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function addUser($joincode) //🦆
    {
        $this->authorize('update', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.adduser');
    }

    public function submitUser($joincode, Request $request) // Post request
    {
        $this->authorize('update', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

        $user = \App\Models\User::query()->where('email', $request->input('email'))->firstOrFail();
        $institution = \App\Models\Institution::query()->where('joincode', $joincode)->firstOrFail();

        if ($user->exists() && $institution->exists()) {
            $user->institutions()->attach($institution->id);
        }

        return redirect(route('institution.users', $joincode));
    }

    public function process($joincode, Request $request)
    {
        $this->authorize('update', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

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
        $this->authorize('delete', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.delete', [
            'joincode' => $joincode
        ]);
    }

    public function deletedelete($joincode)
    {
        $this->authorize('delete', \App\Models\Institution::query()->firstWhere('joincode', $joincode));

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
