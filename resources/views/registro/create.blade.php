@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registration') }}</div>
{{--                    @if($event->image)--}}
{{--                    <img alt="" width="614" style="height:auto;display:block;" src="{{  $event->image}}"/>--}}
{{--                    <img alt="" width="512" style="height:auto;display:block;"--}}
{{--                         src="{{asset("storage/uploads/event.jpg")}}"/>--}}


                    <div class="card-body">
{{--                        <div class="row mb-3">--}}

{{--                            <h4>{{$event->text}}</h4>--}}
{{--                        <img alt="" class="img-fluid rounded" src="{{ $img_url }}"/>--}}

                        <form action="{{route('records.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="family_name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Family Name') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="family_name" id="family_name"
                                           required autocomplete="current-Name">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="group"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Group Name') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="group" id="group">
                                    {{--    <input type="number" name="cantidad" id="cantidad" placeholder="Numero de Asistentes">--}}
                                    {{--    <br>--}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

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
                                <label for="qty"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Assistant Number') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="qty" id="qty" required min="1" max="50">
                                </div>

                            </div>
                            <div class="row mb-3 px-4">
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <td style="width:50%">Name</td>
                                        <td style="width:25%">Gender</td>
                                        <td>Age</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="name" required></td>
                                        <td><input class="form-control text-end" type="numeric" name="age" required>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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

    <script type="text/javascript">
        $(document).ready(function () {
            let qty_field = $('#qty');
            let table_body = $('#table tbody');

            function agregarLineas() {
                let value = parseInt($(this).val());

                table_body.html(''); // elimino el contenido del body

                let base_tr = $('<tr></tr>')
                let base_td = $('<td></td>')
                let base_input = $('<input class="form-control" required/>')


                for (_i = 0; _i < value; _i++) {

                    let actual_tr = base_tr.clone().appendTo(table_body);

                    let name_td = base_td.clone().appendTo(actual_tr);
                    let gender_td = base_td.clone().appendTo(actual_tr);
                    let age_td = base_td.clone().appendTo(actual_tr);

                    let name_input = base_input
                        .clone()
                        .prop('type', 'text')
                        .prop('name', `people[${_i}][name]`)
                        .prop('id', `people_name_${_i}`)
                        .appendTo(name_td);

                    let gender_input = $('<select class="form-control" required></select>')
                        .prop('name', `people[${_i}][gender]`)
                        .prop('id', `people_gender_${_i}`)
                        .appendTo(gender_td);

                    let age_input = base_input
                        .clone()
                        .prop('min', '0')
                        .prop('type', 'numeric')
                        .prop('name', `people[${_i}][age]`)
                        .prop('id', `people_age_${_i}`)
                        .appendTo(age_td);

                        $('<option value=\'\' selected disabled> -- SELECT -- </option>').appendTo(gender_input);
                        $('<option value=\'M\'> MALE </option>').appendTo(gender_input);
                        $('<option value=\'F\'> FEMALE </option>').appendTo(gender_input);

                }
            }


            qty_field
                .change(agregarLineas)
                .keyup(agregarLineas);


            qty_field.val(1).change();
        })
    </script>

@endsection
