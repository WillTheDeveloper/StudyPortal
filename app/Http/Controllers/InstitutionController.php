<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function view()
    {
        $this->authorize('viewAny', Institution::class);

        return view('institutions.view',
        [
            'all' => Institution::query()->orderByDesc('institutions.institution')->paginate(25),
        ]);
    }

    public function manage($joincode)
    {
        $this->authorize('view', Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.manage', [
            'institution' => Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function create()
    {
        $this->authorize('create', Institution::class);

        return view('institutions.new');
    }

    public function submit(Request $request)
    {
        $this->authorize('create', Institution::class);

        Institution::query()->create(
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
        $this->authorize('update', Institution::query()->firstWhere('joincode', $joincode));

        $new = $request->input('joincode');

        $n = Institution::query()->where('joincode', $joincode)
            ->update([
                'institution' => $request->input('institution'),
                'joincode' => $new
            ]);

        return redirect(route('institution.manage'));
    }

    public function users($joincode)
    {
        $this->authorize('view', Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.users', [
            'users' => Institution::query()->where('institutions.joincode', $joincode)->firstOrFail()
        ]);
    }

    public function addUser($joincode) //🦆
    {
        $this->authorize('update', Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.addUser')->with(["joincode"=>$joincode]);
    }

    public function submitUser($joincode, Request $request) // Post request
    {
        $this->authorize('update', Institution::query()->firstWhere('joincode', $joincode));

        $user = User::query()->where('email', $request->input('email'))->firstOrFail();
        $institution = Institution::query()->where('joincode', $joincode)->firstOrFail();

        if ($user->exists() && $institution->exists()) {
            $user->institutions()->attach($institution->id);
        }

        return redirect(route('institution.users', $joincode));
    }

    public function process($joincode, Request $request)
    {
        $this->authorize('update', Institution::query()->firstWhere('joincode', $joincode));

        $email = $request->input('email');

        $user = User::query()->where('email', $email);

        $id = Institution::query()->where('joincode', $joincode)->get('id');

        if ($user->exists() and $user->get('users.institution_id') == null) {
            $user = User::where('email', $email)->get();
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
        $this->authorize('delete', Institution::query()->firstWhere('joincode', $joincode));

        return view('institutions.delete', [
            'joincode' => $joincode
        ]);
    }

    public function deletedelete($joincode)
    {
        $this->authorize('delete', Institution::query()->firstWhere('joincode', $joincode));

        $institution = Institution::query()->where('joincode', $joincode)->get('id');

        foreach (User::query()->where('institution_id', $institution)->get('id') as $u)
        {
            $u->Instituion->dissociate($u);
            $u->save();
        }

        Institution::query()->where('joincode', $joincode)->delete();

        return redirect(route('institution.manage'));
    }
}
