<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPermission;
use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index ()
    {
        $permissions = Permission::all();

        return view('permissions.index')->with([
            'permissions' => $permissions
        ]);
    }

    public function deletePermission($id, Request $request)
    {
        $permission = Permission::find($id);
        $permission->delete();

        //Message success
        $request->session()->flash('message', '<strong>Concluído!</strong> Permissão removida com sucesso.');

        return redirect()->route('permissions');
    }

    public function savePermission(StoreBlogPermission $request)
    {
        $permission = Permission::create([
            'name' => $request->input('name'),
        ]);

        //Message success
        $request->session()->flash('message', '<strong>Tudo ok!</strong> Permissão salva com sucesso.');

        return redirect()->route('permissions');
    }
}
