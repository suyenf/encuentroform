<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function listevent()
    {
        /** @var Event[] $eventdata */
//        $datos = Record::all();
//        return view('registro.index', compact('datos'));


        $eventdatas = Event::all();
        return view('event.listevent', compact('eventdatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.createevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventInfo = $request->all();
        if ($request->hasFile('image')) {
            $eventInfo['image'] = $request->file('image')->store('uploads', 'public');
        }

        Event::create($eventInfo);
        return response()->json($eventInfo);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $id)
    {
        $event=Event::query()->findOrFail($id);
        return view('event.editevent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
//        Event::destroy($event);
//        return redirect('events/list');
//        return redirect(route('event.destroy'));
        $event->delete();
        return redirect(route('event.listevent', $event));

    }
}
