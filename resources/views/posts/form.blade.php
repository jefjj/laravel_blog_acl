@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="clearfix">Posts <i class="fa fa-angle-right" aria-hidden="true" style="font-size: 20px;"></i> {{ $post->id > 0 ? 'editar' : 'novo' }}</h1>
            </div>
        </div>
        <hr>
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
            <div class="col-md-8 col-md-offset-2">
                <form role="form" method="post" action="{{ route('savePost') }}">
                    <fieldset>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input id="title" name="title" type="text" class="form-control" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea id="content" name="content" class="form-control"
                                      rows="5">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('posts') }}" class="btn btn-sm btn-default" type="submit"><i
                                        class="fa fa-remove"
                                        aria-hidden="true"></i> Cancelar
                            </a>
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"
                                                                                    aria-hidden="true"></i> Salvar
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
