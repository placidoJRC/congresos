@extends('index')
@section("content")
<div class="container">
   <div class="row">
      <div class="col-12">
   <title>Crear Usuario</title>
</head>
<body>
   <div class="row">
      <div class="column">
         <br>
         <h3>Añadir datos</h3>
         <br>
         
      <form method="post" action="{{url('User')}}">
         @csrf
        <div class="form-group">
            <select name="tipo">
                 <option value="asistente">Asistente</option>
                 <option value="ponente">Ponente</option>
                 <option value="comite">Comite</option>
                 <option value="admin">Admin</option>
            </select>
         </div>
         <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="Name"/>
         </div>
         
         <div class="form-group">
               <input type="email" name="email" class="form-control" placeholder="Email"/>
         </div>
         
         <div class="form-group">
               <input type="submit"/>
         </div>
      </form>
      </div>
   </div>
@endsection
