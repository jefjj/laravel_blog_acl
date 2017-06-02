@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="clearfix">Permissões</h1>
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
        <form method="post" action="{{ Route('savePermission') }}">
            <fieldset>
                <legend>Cadastrar nova permissão:</legend>
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" maxlength="30" name="name" class="form-inline">
                    <button type="submit">Cadastrar</button>
                </div>
            </fieldset>
        </form>
        @if ( isset($permissions) && sizeof($permissions) > 0 )
            <table class="table table-bordered table-hover table-condensed table-responsive table-striped">
                <thead>
                <tr>
                    <th>Permissão</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $permissions as $permission )
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td class="text-center"><a href="{{ Route('deletePermission', ['id' => $permission->id]) }}" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="well">Nenhuma permissão cadastrada!</div>
        @endif
    </div>
@endsection
