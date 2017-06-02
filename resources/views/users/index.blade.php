@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="clearfix">Usuários</h1>
            </div>
        </div>
        <hr>
        @if( Session::has('message') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                {!!  Session('message') !!}
            </div>
        @endif
        @if (isset($users) && !is_null($users) )
            <table class="table table-bordered table-hover table-condensed table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><span class="text-primary">{{ $user->email }}</span></td>
                            <td class="text-center"><a href="{{ Route('deleteUser', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="well">Nenhum usuário encontrado!</div>
        @endif
    </div>
@endsection
