@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1 class="clearfix">Posts</h1>
            </div>
            <div class="col-sm-3 text-right action-btns">
                <a class="btn btn-primary" href="{{ Route('newPost') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Novo
                </a>
                @if( Auth::user() )
                <div class="btn-group" role="group" aria-label="...">
                    <form id="postsById" method="post" action="{{ Route('postsById') }}">
                        {{ csrf_field() }}
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="#" class="list-my-posts">
                                        @if( Session::has('filter_posts_by_user_id'))
                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                        @endif
                                        Filtrar apenas meus posts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                @endif
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
        @forelse( $posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p class="text-muted"><b>Autor: {{ $post->user->name }}</b></p>
            @can('manipulate', $post)
                <div>
                    @can('update', $post)
                        <a href="{{ Route('updatePost', ['id' => $post->id]) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                        </a>
                    @endcan
                    @can('delete', $post)
                        <a href="{{ Route('deletePost', ['id' => $post->id]) }}" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash"
                                    aria-hidden="true"></i> Excluir</a>
                    @endcan
                </div>
            @endcan
            <hr>
        @empty
            <div class="well">Nenhum post encontrado!</div>
        @endforelse
    </div>
@endsection
