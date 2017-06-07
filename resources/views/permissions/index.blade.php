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
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-4">
                <div class="well">
                    <form method="post" action="{{ Route('savePermission') }}">
                        <fieldset>
                            <legend>Cadastrar nova permissão:</legend>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" type="text" name="name" class="form-control" maxlength="30">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
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
        </div>
    </div>
@endsection
