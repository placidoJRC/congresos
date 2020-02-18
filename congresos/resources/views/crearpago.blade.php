@extends('index')

@section('content')
<hr>
    <form action="{{ url('pago/store') }}" method="post" enctype="multipart/form-data">
        @csrf


        <h3>
            Introduce resguardo de pago
            <br>
            <input type="file" name="imagen" id="imagen">
        </h3>
        <h3>
            <a href="{{url('ponencia')}}" class="btn btn-info">volver</a>
            <input class="btn btn-info"type="submit" value="crear">
        </h3>
    </form>
@endsection

