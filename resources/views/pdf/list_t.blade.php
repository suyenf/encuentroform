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

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td align="center" style="padding:40px 0 30px 0;" colspan="6">
                    <h1>Schoenstatt Houston Family Day</h1>
                    <img alt="" width="130" style="height:auto;display:block;" src="{{storage_path('app/public/uploads/logo.png')}}" alt="logo"/>
                    <h2>Records Lists</h2>
                </td>
            </tr>
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
