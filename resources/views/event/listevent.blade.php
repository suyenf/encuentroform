<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Event</th>
        <th>Image</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($eventdatas as $eventdata)
        <tr>
            <td>{{$eventdata->id}}</td>
            <td>{{$eventdata->text}}</td>
            <td><img src="{{ asset("storage/$eventdata->image")}}" /></td>

            <td>{{$eventdata->date}}</td>
            <td>
                <a href="{{route('event.edit',[$eventdata->id])}}">Edit</a>

                <a href="{{route('event.destroy',[$eventdata->id])}}"
                   class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete it?')">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
