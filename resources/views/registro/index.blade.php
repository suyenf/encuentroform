@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Records</h2>
        <div class="row">
            {{--            <div class="col-xl-12">--}}
            {{--                <form action="">--}}
            {{--                    <div class="form-row">--}}
            {{--                        <div class="col-sm-4 my-1">--}}
            {{--                            <input type="text" class="form-control" name="text">--}}
            {{--                            <div class="col-auto my-1">--}}
            {{--                                <input type="submit" class="btn btn-primary" value="Search">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            @include('layouts.banner')


    </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>

                        <tr>
                            <td>#</td>
                            <td>Family Name</td>
                            <td>Group</td>
                            <td>QTY</td>
                            <td>Phone</td>
                            <td>Email</td>
                            {{--                            <td>Action</td>--}}
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($datos as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{{$record->family_name}}</td>
                                <td>{{$record->group}}</td>
                                <td>{{$record->qty}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$record->email}}</td>
                                {{--                                <td>{{array_sum($record->qty)}}</td>--}}
                                {{--                                <td>Edit | Delete | Print</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{$datos->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
