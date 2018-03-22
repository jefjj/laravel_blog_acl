@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="clearfix">Image upload</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        @if ( isset($img) )
        <div class="col-sm-12">
            <div class="well">
                <h3 class="text-mutted">Imagem salva</h3>
                <img src="{{ $img }}" class="center-block image-responsive" alt="Imagem recebida por upload">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <div class="well">
                <form method="post" action="{{ Route('imageUpload') }}" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Enviar nova imagem:</legend>
                        {{ csrf_field() }}
                        <input type="hidden" id="photo-width" name="photo-width" value="">
                        <input type="hidden" id="photo-height" name="photo-height" value="">
                        <input type="hidden" id="photo-x" name="photo-x" value="">
                        <input type="hidden" id="photo-y" name="photo-y" value="">
                        <div class="form-group">
                            <label for="photo">Arquivo</label>
                            <input type="file" accept="image/*" id="photo" name="photo">
                            <p class="help-block">Selecione uma imagem para upload.</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="permitirEsticar" name="permitirEsticar"> Permitir esticar a imagem
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="well">
                <h3 class="text-mutted">Preview</h3>
                <hr>
                <div class="form-group">
                    <div class="radio">
                        <label id="aspectRatio1" class="radio-inline">
                            <input type="radio" name="aspectRatio" value="square" checked=""> Quadrado
                        </label>
                        <label id="aspectRatio2" class="radio-inline">
                            <input type="radio" name="aspectRatio" value="wide"> Widescreen
                        </label>
                    </div>
                </div>
                <div class="preview-box">
                    <img src="" id="preview" alt="preview" class="center-block image-responsive">
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection