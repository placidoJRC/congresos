   
   @extends('index')
@section("content")
<div class="container">
   <div class="row">
     
       <table class="table">
          <thead>
            <tr>
                <th scope="col">titulo</th>
                <th scope="col">descripcion</th>
                <th scope="col">precio</th>

            </tr>

            @foreach ($congresos as $congreso)
           <tr>
              <td>{{$congreso->titulo}}</td>
              <td>{{$congreso->decripcion}}</td>
              <td>{{$congreso->precio}}</td>
              
      
            @endforeach
            </table>
            </div>
        
      </div>
   </div>
</div>
@endsection