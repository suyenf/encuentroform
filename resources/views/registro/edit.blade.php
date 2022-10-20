@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Family Branch') }}</div>
                    <div class="card-body">

                        @if($record->locked)
                            <div class='bg-danger'>
                            Bloqueado
                            </div>

                        @endif

                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Family Name</td>
                                <td>{{$record->family_name}}</td>
                            </tr>
                            <tr>
                                <td>Group to Which They Belong</td>
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

                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>Gender</td>
                                <td>Dob</td>
                                <td>Age</td>
                                <td>Actions</td>
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
                                        <a href="{{route('records.people.destroy',[$record->id,$person->id])}}"
                                           class="btn btn-danger btn-sm">&times;</a>
                                        {{--                                            <form action="{{route('records.people.destroy',$record)}}" method="POST">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                @method('delete')--}}
                                        {{--                                                <button class="btn btn-danger" type="submit" rel="tooltip">--}}
                                        {{--                                                    <i class="material-icons">x</i>--}}
                                        {{--                                                </button>--}}
                                        {{--                                            </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            @if(!$record->locked && ($record->qty > $record->people->count()))
                                <form method="post" action="{{route('records.people.store',$record)}}">
                                    @csrf
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
                                </form>

                            @endif

                        </table>

                        @if($record->people->count() && !$record->locked)
                            <form action="{{route('records.lock',$record->id)}}" method='post' class="text-end">
                                @csrf
                                <button type='submit'  class="btn btn-primary ">
                                    Mark as Complete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
