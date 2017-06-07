<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Http\Requests\StoreBlogRole;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index ()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('roles.index')->with([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    public function deleteRole($id, Request $request)
    {
        $role = Role::find($id);
        $role->delete();

        //Message success
        $request->session()->flash('message', '<strong>Concluído!</strong> Papel removido com sucesso.');

        return redirect()->route('roles');
    }

    public function saveRole(StoreBlogRole $request)
    {
        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        $role->permissions()->attach($request->input('permissions'));

        //Message success
        $request->session()->flash('message', '<strong>Tudo ok!</strong> Papel salvo com sucesso.');

        return redirect()->route('roles');
    }
}
