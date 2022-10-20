@extends('template')
@section('content')
    @include('create')


    @if($record->people->count() && !$record->locked)
    {{--para completar el formulario--}}
    {{--debe bloquear el registro en la tabla records [locked = 1]--}}
    {{--esto pera prevenir intrisiones y modificaciones--}}
    {{--se debe  crear la ruta el metodo en el controlador y el proceso del mismo--}}
        <form action="" class="text-end">
            <button type="submit" class="btn btn-primary">Marcar Completado</button>
        </form>
    @endif
@endsection
