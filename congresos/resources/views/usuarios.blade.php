   
   @extends('index')
@section("content")
<div class="container">
   <div class="row">
      <div class="col-12">
        @if (Auth::user()->tipo != "asistente")
            <h3> Lista Usuarios </h3>
            <br>
            <div align="right">
                
            @if (Auth::user()->tipo == 'admin')
            <a href="{{route('User.create')}}">Crear</a>
            @endif
            
            </div>
       <table class="table">
          <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>

                @if (Auth::user()->tipo == 'comite')
                    <th scope="col">Edit</th>    
                @endif
                
                @if (Auth::user()->tipo == 'admin')
                    <th scope="col">Edit</th>    
                    <th scope="col">Delete</th>
                @endif

            </tr>

            @foreach ($usuarios as $user)
           <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->tipo}}</td>
              
      @if (Auth::user()->tipo == 'comite')
           <td><a href="{{ url('User/' . $user->id . '/edit') }}">Edit</a></td>
        @endif
                
                @if (Auth::user()->tipo == 'admin')
           <td><a href="{{ url('User/' . $user->id . '/edit') }}">Edit</a></td>

                @endif

           </tr>
            @endforeach
            </table>
            </div>
            @else
                No tiene permisos para ver esto
           @endif
      </div>
   </div>
</div>
@endsection