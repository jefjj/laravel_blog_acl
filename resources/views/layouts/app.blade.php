<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('css/schedule-app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('js/lib/themes/default.css') }}">
  <link rel="stylesheet" href="{{ asset('js/lib/themes/default.date.css') }}">
  <link rel="stylesheet" href="{{ asset('js/lib/themes/default.time.css') }}">
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Blog do Post') }}
          </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            <li>
              <a href="{{ route('posts') }}">Posts</a>
            </li>
            <li>
              <a href="{{ route('users') }}">Usuários</a>
            </li>
            <li>
              <a href="{{ route('roles') }}">Papéis</a>
            </li>
            <li>
              <a href="{{ route('permissions') }}">Permissões</a>
            </li>
            <li>
              <a href="{{ route('image') }}">Image Crop</a>
            </li>
            <li>
              <a href="{{ route('docGet') }}">Office Word</a>
            </li>
            <li>
              <a href="{{ route('scheduling') }}">Agendamento</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li>
              <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
              <a href="{{ route('register') }}">Cadastro</a>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <!-- Button trigger modal -->
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">
                    Alterar senha
                  </a>
                </li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
  </div>

  <!-- Modal -->
  <form role="form" method="POST" action="{{ route('changePassword') }}">
    {{ csrf_field() }}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Alterar senha</h4>
          </div>
          <div class="modal-body">

            <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Nova senha</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="row">
              <label for="password-confirm" class="col-md-4 control-label">Confirme a nova senha</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/lib/picker.js') }}"></script>
  <script src="{{ asset('js/lib/picker.date.js') }}"></script>
  <script src="{{ asset('js/lib/picker.time.js') }}"></script>
  <script src="{{ asset('js/lib/legacy.js') }}"></script>
  <script src="{{ asset('js/lib/translations/pt_BR.js') }}"></script>
  <script src="{{ asset('js/all.js') }}"></script>
</body>

</html>