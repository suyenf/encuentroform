@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registration') }}</div>
                    <div class="card-body">

                        @if($record->locked)
                       <div class="alert alert-success" role="alert">
                        {{__('Completed')}}
                       </div>

                        @else
                        <a href="{{route('records.edit',$record)}}">
                            Edit
                        </a>
                        @endif

                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Family Name</td>
                                <td>{{$record->family_name}}</td>
                            </tr>
                            <tr>
                                <td>Group Name</td>
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
                                <td>Age</td>
                            </tr>
                            @foreach($record->people as $person)
                                <tr>
                                    <td> {{$person->name}}</td>
                                    <td> {{$person->gender}}</td>
                                    <td> {{$person->dob->diffInYears()}}</td>

                                </tr>
                            @endforeach


                        </table>
<a class="btn btn-primary" href="{{ route('records.create')}}">Close</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@include('mail.organization')--}}
{{--@include('mail.owner')--}}
