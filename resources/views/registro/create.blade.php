@extends('template')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<form action="{{route('records.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="family_name" id="family_name" placeholder="Nombre de la Familia">
    <br>
    <input type="text" name="group" id="group" placeholder="Grupo al que pertenecen">
    <br>
{{--    <input type="number" name="cantidad" id="cantidad" placeholder="Numero de Asistentes">--}}
{{--    <br>--}}
    <input type="tel" name="phone" id="phone" placeholder="Telefono de Contacto">
    <br>
    <input type="email" name="email" id="email" placeholder="Email de Contacto">
    <br>
    <input type="number" name="qty" id="qty" placeholder="Numero de Asistente">
    <br>

    <input type="submit" value="Enviar">


</form>
@endsection
