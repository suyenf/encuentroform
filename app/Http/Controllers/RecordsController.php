<?php

namespace App\Http\Controllers;

use App\Mail\OrganizationRecordCompleted;
use App\Mail\OwnerRecordCompleted;
use App\Models\Event;
use App\Models\Person;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        /** @var Record[] $datos */
//        $datos = Record::all();
//        return view('registro.index', compact('datos'));
    }

    public function pdf()
    {
        $records = Record::paginate();
        return view('records.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::find(4);
        $img_url = Storage::disk('public')->url($event->image);
        return view('registro.create', ['event' => $event, 'img_url' => $img_url]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $event = Event::find(4);
        // recogemos la data
        $valid_data = $request->all();
        $valid_data['locked'] = true;

        // creamos nustro registro principal
        $new_record = Record::create($valid_data);

        // ingresamos CADA persona como relacion
        foreach ($request->get('people') as $person) {

            $person['dob'] = Carbon::now()->subYears($person['age']);
            $new_record->people()->create($person);
        }

        // notificar al dueño
        Mail::send(new OwnerRecordCompleted($new_record, $event));

        // notificar al organizador
        Mail::send(new OrganizationRecordCompleted($new_record));

        // se notifica el registro en pantalla
        return redirect(route('records.show', $new_record));

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        $record->load('people');
        return view('registro.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response|\never
     */
    public function edit(Record $record)
    {
        if ($record->locked) return abort(404);
        $record->load('people');

        return view('registro.edit', ['record' => $record]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }

    public function peopleStore(Request $request, Record $record)
    {
        $valid_data = $request->only([
            'name',
            'gender',
            'dob',
        ]);

        $valid_data['record_id'] = $record->id;

        Person::create($valid_data);
        return redirect(route('records.edit', $record));
    }

    public function peopleDestroy(Record $record, Person $person)
    {
        $person->delete();
        return redirect(route('records.edit', $record));
    }

    public function lock(Record $record) // accion   explicita
    {
        // se bloquea el registro que viene desde parametros
        $record->update(['locked' => true,]); //este se bloquea el registro

        // se envia a un correo al que se registra//  CON ESTE COMANDO SE CREA LA PLANTILLA = php artisan make:mail OwnerRecordCompleted
        Mail::send(new OwnerRecordCompleted($record));


        // se envia al organizador // CON ESTE COMANDO SE CREA LA PLANTILLA = php artisan make:mail OrganizationRecordCompleted
        Mail::send(new OrganizationRecordCompleted($record));


        //retorna al registro ya bloqueado
        return redirect(route('records.show', $record)); // nos vamos otra vez al edit


//        $record ->update([
//            'locked'  => true, //este se bloquea
//        ]);
//
//        $msj = ['It is Locked'];
//        return view ('registro.edit', ['smj' => $msj]);
////        return view('registro.locked');
    }
//    public function counting(Record $record){
//$record = DB::table('records')
//->select(DB::raw('sum('qty') as Total'))
//->groupBy('They will attend')
//->get();
//}


}
