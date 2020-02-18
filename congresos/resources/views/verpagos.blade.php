   
   @extends('index')
@section("content")
<div class="container">
   <div class="row">
     
       <table class="table">
          <thead>
            <tr>
                <th scope="col">documento</th>
                <th scope="col">descripcion</th>
                <th scope="col">verificado</th>

            </tr>

            @foreach ($pagos as $pago)
            
           <tr>
              <td>{{$pago->documento}}</td>
              <td> @foreach ($usuarios as $usuario)
                  @if($pago->iduser==$usuario->id)
                  {{$usuario->name}}
                  @endif
                  @endforeach
                  </td>
              <td>@if($pago->verificado==0)
              no
              @endif
              @if($pago->verificado==1)
              si
              @endif
              </td>
              @if($pago->verificado==0)
              <td><form action="{{ url('pago/' .$pago->id) }}" method="post" class="form" id="form" enctype="multipart/form-data">
                  @csrf
                  <input type="number" name="verificar" id="verificar" value="1" hidden/>
                  <input type="submit" value="verificar"/>
              </form></td>
               @endif
      
            @endforeach
            </table>
            </div>
        
      </div>
   </div>
</div>
@endsection