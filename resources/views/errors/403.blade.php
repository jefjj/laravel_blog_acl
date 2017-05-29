@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="text-danger">Não autorizado!</span>
                <a href="#" class="btn btn-xs btn-primary" onclick="javascript:window.history.back()">voltar</a>
            </div>
        </div>
    </div>
@endsection
