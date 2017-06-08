@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-lg text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Oops! Não encontramos a página desejada.</div>
                <a href="{{ Route('posts') }}" class="btn btn-xs btn-primary">Ir para home</a>
            </div>
        </div>
    </div>
@endsection
