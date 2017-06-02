@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="clearfix">Papéis</h1>
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
        <div class="row">
            <div class="col-sm-4">
                <div class="well">
                    <form method="post" action="{{ Route('saveRole') }}">
                        <fieldset>
                            <legend>Cadastrar novo papel:</legend>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" type="text" name="name" class="form-control" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="name">Permissões</label>
                                <ul class="list-group">
                                    @forelse( $permissions as $permission )
                                        <li class="list-group-item">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{ $permission->name }}
                                                </label>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="list-group-item">
                                            Nenhuma permissão cadastrada!
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                @if ( isset($roles) && sizeof($roles) > 0 )
                    <table class="table table-bordered table-hover table-condensed table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>Papel</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $roles as $role )
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td class="text-center"><a href="{{ Route('deleteRole', ['id' => $role->id]) }}"
                                                           class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="well">Nenhum papel cadastrado!</div>
                @endif
            </div>
        </div>
    </div>
@endsection
