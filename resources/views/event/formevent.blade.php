@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-header">{{ __('Events') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <textarea name="text" id="text" rows="10" cols="80" value="{{$event->text}}"></textarea>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"> Image </label>
                                <input type="file" name="image" id="image">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" name="Send">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
