@extends('index')
@section("content")
<div class="container">
   <div class="row">
      <div class="col-12">
   <title>Crear Ponencia</title>
</head>
<body>
  @if (Auth::user()->tipo == 'admin')
   <div class="row">
      <div class="column">
         <br>
         <h3>Añadir datos</h3>
         <br>
         
      <form method="post" action="{{url('Ponencia')}}">
         @csrf

         <div class="form-group">
        <select name="iduser">
                        <option value=""></option>
            @foreach ($users as $user)
             <option value="{{ $user->id }}">{{ $user->id }}  -> {{ $user->name }} </option>
            @endforeach
        </select>
         </div>
         <div class="form-group">
               <input type="text" name="titulo" class="form-control" placeholder="Title"/>
         </div>
         <div class="form-group">
               <input type="text" name="video" class="form-control" placeholder="Video"/>
         </div>
         <div class="form-group">
               <input type="submit"/>
         </div>
      </form>
      </div>
   </div>
  @endif
  
  @if (Auth::user()->tipo == 'ponente')
     <div class="row">
      <div class="column">
         <br>
         <h3>Añadir datos</h3>
         <br>
         
      <form method="post" action="{{url('ponencia/create')}}">
         @csrf
         <div class="form-group">
               <input type="text" name="titulo" class="form-control" placeholder="Title"/>
         </div>
         <div class="form-group">
               <input type="text" name="video" class="form-control" placeholder="Video"/>
         </div>
         <input type="text" name="iduser" class="form-control" placeholder="Title" value="{{ Auth::user()->id }}" hidden/>
         <div class="form-group">
               <input type="submit"/>
         </div>
      </form>
      </div>
   </div>
  @endif
  
@endsection