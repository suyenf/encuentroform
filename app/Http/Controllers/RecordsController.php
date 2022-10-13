<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosRegistro = $request->all();
//       $datosRegistro = request()->except('_token');
        $algo = Record::create($datosRegistro);
        return redirect(route('records.edit', $algo));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
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

    public function peopleDestroy(Person $person)
    {
        //
    }
}
