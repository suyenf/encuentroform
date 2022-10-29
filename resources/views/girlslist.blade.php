@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Girls Records</h2>
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
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-md-3">--}}
{{--                    <div class="card bg-primary text-white mb-4">--}}
{{--                        <div>--}}
{{--                            <div class="card-body">--}}
{{--                                Adults--}}
{{--                                <h2>{{ $adults }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                                <a class="small text-white stretched-link"  href="#">View Details</a>--}}
{{--                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-md-3">--}}
{{--                    <div class="card bg-info text-white mb-4">--}}
{{--                        <div>--}}
{{--                            <div class="card-body">--}}
{{--                                Boys--}}
{{--                                <h2>{{ $boys }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                                <a class="small text-white stretched-link"  href="#">View Details</a>--}}
{{--                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-md-3">--}}
{{--                    <div class="card bg-warning text-white mb-4">--}}
{{--                        <div>--}}
{{--                            <div class="card-body">--}}
{{--                                Girls--}}
{{--                                <h2>{{ $girls }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                                <a class="small text-white stretched-link"  href="#">View Details</a>--}}
{{--                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-md-3">--}}
{{--                    <div class="card bg-primary text-white mb-4">--}}
{{--                        <div>--}}
{{--                            <div class="card-body">--}}
{{--                                Total--}}
{{--                                <h2>{{ $countqty }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                                <a class="small text-white stretched-link"  href="#">View Details</a>--}}
{{--                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
{{--                                <td>Edit | Delete | Print</td>--}}
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
