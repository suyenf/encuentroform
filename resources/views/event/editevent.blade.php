@extends('layouts.app')
@section('content')

    <form action="{{route('event.update',$event->id)}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-header">{{ __('Events') }}</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">

                                    <textarea class='form-control' name="text" id="editor" rows="10">{{ $event->text }}</textarea>

                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-4">
                                    <img alt="" class="img-fluid rounded" src="{{ $img_url }}"/>
                                </div>
                                <div class="col-8">
                                    <label class="form-label" for="image"> Image </label>
                                    <input class="form-control" type="file" name="image" id="image" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="Send">Send</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
         $('textarea#editor').summernote();
    </script>
@endsection

{{--@include('mail.organization')--}}
{{--@include('mail.owner')--}}
