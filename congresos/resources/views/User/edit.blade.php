@extends('index')
@section("content")
<div class="container">
   <div class="row">
      <div class="col-12">
   <title>Edit user</title>
</head>
<body>
    @if (Auth::user()->tipo == 'comite' || Auth::user()->tipo == 'admin')
   <div class="row">
      <div class="column">
         <br>
         <h1>Editar datos</h1>
         <br>
         
<form action="{{ url('User/' . $user->id) }}" method="post" class="form" id="form" enctype="multipart/form-data">
         @csrf
        @method('PUT')
         <div class="form-group">
         <h3>Name</h3>
         <input type="text" value="{{ old('name', $user->name) }}" name="name" class="form-control" placeholder="Name"/>
         </div>
       <!--<h3>Email</h3>-->
       <!--  <input type="email" value="{{  old('email', $user->email) }}" name="email" class="form-control" placeholder="Email"/>-->

       <!-- <input type="text" value="{{  old('password', $user->password) }}" name="password" class="form-control" placeholder="Password" hidden/>-->
       <!-- <br>-->
         <div class="form-group">
        <h3>Type</h3>
        <select name="tipo" value="{{ $user->tipo }}">

            <option value="{{ $user->type }}">{{ $user->tipo }}</option>
            
            @if ($user->tipo != 'asistente')
                        <option value="asistente">asistente</option>
            @endif
            @if ($user->tipo != 'ponente')
                        <option value="ponente">ponente</option>
            @endif
            @if ($user->tipo != 'comite')
                        <option value="comite">comite</option>
            @endif
            @if ($user->tipo != 'admin')
                        <option value="admin">admin</option>
            @endif

        </select>
         </div>
         <div class="form-group">
                <input type="submit" value="Confirm Changes" id="form-button" class="btn btn-primary">
         </div>
      </form>
      </div>
   </div>
   @else
   <p>No tiene permisos para esta accion</p>
   @endif
@endsection