@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Adult Records
{{--        <a href="#" class="btn btn-primary btn-sm ">Home</a>--}}
        </h2>
        <div class="row">
            @include('layouts.banner')
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <td>#</td>
                            <td>Family Name</td>
                            <td>Group</td>
                            <td>Name</td>
                            <td>Gender</td>
                            <td>Age</td>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($datos as $people)
                            <tr>
                                <td>{{$people->id}}</td>
                                <td>{{$people->record->family_name}}</td>
                                <td>{{$people->record->group}}</td>
                                <td>{{$people->name}}</td>
                                <td>{{$people->gender}}</td>
                                <td>{{$people->dob->diffInYears()}}</td>
                                <td>{{$people->age}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$datos->links()}}

        </div>
    </div>

@endsection
