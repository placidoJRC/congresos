<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"><!-- PROBLEMA -->
        <link href="{{ url('assets/css/jumbotron.css') }}" rel="stylesheet"><!-- PROBLEMA -->
        <link href="{{ url('assets/css/own.css') }}" rel="stylesheet"><!-- PROBLEMA -->
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active" style="padding-right:8px;">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                    @auth
                        <li class="nav-item active" style="padding-right:8px;">
                            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('user/') }}">{{Auth::user()->name}}</a>
                            <!-- . '?previous=' . Request::fullUrl() -->
                        </li>
                        <li class="nav-item active">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('login') }}">Sign in</a>
                            <!-- . '?previous=' . Request::fullUrl() -->
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('register')}}">Sign up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">Hello, world!</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a>
                    </p>
                </div>
            </div>
            <div class="container">
                
                <!-- contenido a rellenar -->
              
                @auth
                <?php if (Auth::user()->tipo=="admin"){ ?>
                <a class="btn btn-primary btn-lg" href="{{url('usuarios')}}" role="button">Ver Usuarios &raquo;</a>
                <a class="btn btn-success btn-lg" href="{{url('congreso')}}" role="button">Ver Congresos &raquo;</a>
                <a class="btn btn-danger btn-lg" href="{{url('ponencia')}}" role="button">Ver Ponencias &raquo;</a>
                <a class="btn btn-warning btn-lg" href="{{url('pago')}}" role="button">Ver Pagos &raquo;</a>
                <?php }?>
                
                 <?php if (Auth::user()->tipo=="ponente"){ ?>
                <a class="btn btn-primary btn-lg" href="{{url('ponencia')}}" role="button">Ver Ponencias &raquo;</a>
                <a class="btn btn-success btn-lg" href="{{url('ponencia/create')}}" role="button">Crear Ponencias &raquo;</a>
                
                <?php }?>
                
                      <?php if (Auth::user()->tipo=="comite"){ ?>
                <a class="btn btn-primary btn-lg" href="{{url('usuarios')}}" role="button">Ver Usuarios &raquo;</a>

                <?php }?>
                
                      <?php if (Auth::user()->tipo=="asistente"){ ?>
                <a class="btn btn-primary btn-lg" href="{{url('ponencia')}}" role="button">Ver Ponencias &raquo;</a>
                @isset($pagos)
                @foreach ($pagos as $pago)
                 @if( $pago->iduser==Auth::user()->id)
               <?php $pagado=true;?>
                
                 @endif
                @endforeach
               @endisset
               <?php if(!$pagado==1){
               ?>
               <a class="btn btn-success btn-lg" href="{{url('pagar')}}" role="button">Pagar &raquo;</a>
               
               <?php } ?>
                <?php }?>

                @endauth
                @yield('content')
            </div>
        </main>
        <footer class="container">
            <p>&copy; Company 2017-2019</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="{{ url('assets/js/jquery-3.3.1.slim.min.js') }}"><\/script>')</script>
        <!-- PROBLEMA -->
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script><!-- PROBLEMA -->
    </body>
</html>