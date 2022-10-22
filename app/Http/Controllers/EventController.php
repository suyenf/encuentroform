<?php

namespace App\Http\Controllers;

use App\Mail\OrganizationRecordCompleted;
use App\Mail\OwnerRecordCompleted;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
//        if ($request->hasFile('image')) {
//            $eventInfo['image'] = $request->file('image')->store('uploads', 'public');
//        }

        Event::create($eventInfo);
        return response()->json($eventInfo);

        // notificar al organizador
        Mail::send(new OrganizationRecordCompleted($eventInfo));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $img_url = Storage::disk('public')->url($event->image);

        return view('event.editevent', compact('event', 'img_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {

        $event = Event::find($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image); // disco local
            $event->image = $request->file('image')->store('uploads', 'public');// devuelve el path de donde puso el archivo
        }

        $event->text = $request->get('text');
        $event->save();

        return redirect()->route('event.edit',$event);//

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event)
    {
//        Event::destroy($event);
//        return redirect('events/list');
//        return redirect(route('event.destroy'));
        $event->delete();
        return redirect()->route('event.listevent', $event);

    }

    public function showevent(Event $eventdatas)
    {
        $eventdatas = Event::all();
//        return redirect(route('event.showev', $eventdatas));
        return view('event.showevent', compact('eventdatas'));

    }


}
