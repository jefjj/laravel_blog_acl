@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="clearfix">Office Word DOC</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @if ($doc)
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Arquivo gerado!</strong> Clique para baixar: <a href="{{ $doc }}">{{ $doc }}</a>
                </div>
            @endif
            <div class="well">
                <form method="post" action="{{ Route('docPost') }}" enctype="application/x-www-form-urlencoded">
                    <fieldset>
                        <legend>{{ $info }}</legend>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="photo">Título</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Texto</label>
                            <textarea name="texto" id="texto" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Qtd. de colunas</label>
                            <input type="number" name="cols" id="cols" class="form-control" value="1" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection