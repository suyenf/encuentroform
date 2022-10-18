@extends('layouts.app')
{{--@extends('template')--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Family Branch') }}</div>
                    <div class="card-body">
                        <form action="{{route('records.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="family_name" class="col-md-4 col-form-label text-md-end">{{ __('Family Name') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="family_name" id="family_name"
                                            required autocomplete="current-Name">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="group" class="col-md-4 col-form-label text-md-end">{{ __('Group to Which They Belong') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="group" id="group">
                                    {{--    <input type="number" name="cantidad" id="cantidad" placeholder="Numero de Asistentes">--}}
                                    {{--    <br>--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" class="form-control" type="tel" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="qty" class="col-md-4 col-form-label text-md-end">{{ __('Assistant Number') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="qty" id="qty">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" value="Send">
                                {{__('Send')}}
                            </button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
