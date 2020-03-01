<?php
namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $role=Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit',$role->id)->with('info','Usuario Guardado');
    }

    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit',$role->id)->with('info','Rol Actualizado');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info','Usuario Eliminado');
    }
}
