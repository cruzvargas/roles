<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('users.show',compact($user));
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));//shinobi
        return redirect()->route('users.edit',$user->id)->with('info','Actualizado con éxito');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('info','Eliminado Correctamente');
    }
}
