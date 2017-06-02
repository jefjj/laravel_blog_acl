@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-lg text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Você não possui permissão para executar esta tarefa!</div>
                <a href="#" class="btn btn-xs btn-primary" onclick="javascript:window.history.back()">voltar</a>
            </div>
        </div>
    </div>
@endsection
