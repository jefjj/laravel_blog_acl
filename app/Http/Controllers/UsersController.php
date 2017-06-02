<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index ()
    {
        $users = User::all();

        return view('users.index')->with([
            'users' => $users
        ]);
    }

    public function deleteUser($id, Request $request)
    {
        if( Auth::user()->id === (int)$id)
            abort(403, 'Unauthorized action.');

        $user = User::find($id);
        $user->delete();

        //Message success
        $request->session()->flash('message', '<strong>Concluído!</strong> Usuário removido com sucesso.');

        return redirect()->route('users');
    }
}
