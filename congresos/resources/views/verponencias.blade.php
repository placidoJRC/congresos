

@extends('index');

@section('content')


<table class="table table-striped table-hover">
    <?php
    $pagado=false;
    ?>
    
        @foreach($pagos as $pago)
        <?php 
        if($pago->iduser==Auth::user()->id){
        $pagado=true;} ?>
        @endforeach

        @foreach($ponencias as $ponencia)

    <tr>
        <td>Titulo</td>
        <td>
            {{ $ponencia->titulo }}
        </td>
            <?php if($pagado==true){?>
         <td>
         
        <a href="{{route('verponencia',$ponencia->id)}}" class="btn btn-info">asistir</a>
        </td>
        <?php }?>
    </tr>
       @endforeach


</table>
<a href="{{ url('') }}" class="btn btn-info">volver</a>
<hr>

@endsection