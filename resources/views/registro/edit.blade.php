@extends('template')
@section('content')
    <table class="table">
        <tbody>
        <tr>
            <td>Nombre Familiar</td>
            <td>{{$record->family_name}}</td>
        </tr>
        <tr>
            <td>Grupo</td>
            <td>{{$record->group}}</td>
        </tr>
        <tr>
            <td>QTY</td>
            <td>{{$record->qty}}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{$record->phone}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$record->email}}</td>
        </tr>

        </tbody>
    </table>
    <form method="post" action="{{route('records.people.store',$record)}}">
        @csrf
        <table class="table">
            <tr>
                <td>Name</td>
                <td>Gender</td>
                <td>Dob</td>
                <td>Age</td>
                <td>Acciones</td>
            </tr>
            @foreach($record->people as $person)
                <tr>
                    <td> {{$person->name}}</td>
                    <td> {{$person->gender}}</td>
                    <td> {{$person->dob->format('m/d/Y')}}</td>
                    <td> {{$person->dob->diffInYears()}}</td>
                    <td class="text-center">
{{--                        accion para eliminar una persona--}}
{{--                        debe usar personDestory de la clase RecordsController--}}
                        <a href="#" class="btn btn-danger btn-sm">&times;</a>
                    </td>
                </tr>
            @endforeach
            @if(!$record->locked)
                <tr>
                    <td><input type="text" class="form-control" name="name" required></td>
                    <td>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="">-- SELECT --</option>
                            <option value="M">MALE</option>
                            <option value="F">FEMALE</option>
                        </select>
                    </td>
                    <td><input class="form-control text-end" type="date" name="dob" required></td>
                    <td></td>
                    <td>
                        <button class="btn btn-outline-primary" type="submit">Save</button>
                    </td>
                </tr>
            @endif

        </table>

    </form>
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
