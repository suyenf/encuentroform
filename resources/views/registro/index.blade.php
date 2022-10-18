@extends('layouts.app')
@section('content')

<table class="table">
    <tbody>
    <tr>
        <td>#</td>
        <td>Family Name</td>
        <td>Group</td>
        <td>QTY</td>
        <td>Phone</td>
        <td>Email</td>
        <td></td>
    </tr>

    </tbody>
    @foreach($datos as $record)
        <tr>
            <td>{{$record->id}}</td>
            <td>{{$record->family_name}}</td>
            <td>{{$record->group}}</td>
            <td>{{$record->qty}}</td>
            <td>{{$record->phone}}</td>
            <td>{{$record->email}}</td>
        </tr>
    @endforeach
</table>
@endsection
