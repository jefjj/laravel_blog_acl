@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="clearfix">Posts <a class="btn btn-primary pull-right" href="{{ route('post') }}"><i
                        class="fa fa-plus" aria-hidden="true"></i> Novo</a></h1>
        <hr>
        @forelse( $posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p class="text-muted"><b>Autor: {{ $post->user->name }}</b></p>
            <div>
                <a href="{{ route('post', ['id' => $post->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                </a>
                <a href="{{ route('deletePost', ['id' => $post->id]) }}" class="btn btn-sm btn-danger"><i
                            class="fa fa-trash"
                            aria-hidden="true"></i>
                    Excluir</a>
            </div>
            <hr>
        @empty
            <div class="well">Nenhum post encontrado!</div>
        @endforelse
    </div>
@endsection
