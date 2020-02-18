@extends('index')
@section("content")


<div class="container">
   <div class="row">
      <div class="col-12">
   <title>Document</title>
</head>
<body>

<h1>Curso de {{$ponencia->titulo}}</h1>
<form method="post" action="{{url('userponencia')}}">
   @csrf
    <input name="idponencia" value="{{$ponencia->id}}" hidden class="form-control"/>
    @if (empty($userponencia))
          
           <input class="btn btn-primary" type="submit" value="Asistir"/>
          
    @endif
   </form>
<br>
<h2>Video</h2>
    
<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$ponencia->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</iframe>

@endsection
