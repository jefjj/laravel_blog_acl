@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="clearfix">Image upload</h1>
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-sm-4">
                <div class="well">
                    <form method="post" action="{{ Route('imageUpload') }}"  enctype="multipart/form-data">
                        <fieldset>
                            <legend>Enviar nova imagem:</legend>
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="photo">Arquivo</label>
                              <input type="file" id="photo" name="photo">
                              <p class="help-block">Selecione uma imagem para upload.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                @if ( isset($img) )
                  <img src="{{ $img }}" alt="Imagem recebida por upload">
                @else
                  <div class="well">Nenhuma upload realizado!</div>
                @endif
            </div>
        </div>
    </div>
@endsection
