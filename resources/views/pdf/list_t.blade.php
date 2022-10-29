<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Lists</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<h2>Records Lists</h2>

<div class="col-md-12">
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
                    <td>{{$people->record->qty}}</td>
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
</body>
</html>
