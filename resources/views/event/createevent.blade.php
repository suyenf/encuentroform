@extends('layouts.front')

@section('content')

Formulario de eventos

<form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
    @csrf
@include('event.formevent')

</form>
@endsection
