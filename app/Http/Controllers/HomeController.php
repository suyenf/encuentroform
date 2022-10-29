<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use PharIo\Manifest\Author;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     */

    public function index(Person $person)
    {
//        $record = DB::table('records');
////            ->select(DB::raw('sum(qty)'));
////        $datos = Record::all();
//        return view('home', ['datos' => $datos,'record' => $record]);


        $date = Carbon::now()->subYears(18)->firstOfYear();
//dd($date);
        $adults = Person::query()
            ->where('dob', '<=', $date)
            ->get()->count();
        $countqty = Person::count();
        $boys = Person::where('gender', 'M')
            ->where('dob', '>=', $date)
            ->get()->count();
        $girls = Person::where('gender', 'F')
            ->where('dob', '>=', $date)
            ->get()->count();;
        $datos = Record::paginate(10);
        return view('home', ['datos' => $datos,
            'countqty' => $countqty,
            'boys' => $boys,
            'adults' => $adults,
            'girls' => $girls]);

    }

    public function adultslist(Record $record)
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();
//        $age = Carbon::createFromDate(1989-10-28)->age;

        $adults = Person::query()
            ->where('dob', '<=', $date)
            ->get()->count();
        $countqty = Person::count();
        $boys = Person::where('gender', 'M')
            ->where('dob', '>=', $date)
            ->get()->count();
        $girls = Person::where('gender', 'F')
            ->where('dob', '>=', $date)
            ->get()->count();


//        $datos = Record::paginate(10);
        $datos = Person::query()
            ->with([                'record'            ])
            ->where('dob', '<=', $date)
//            ->toSql();
            ->paginate(10);

//        dd($datos);
        return view('adultslist', ['datos' => $datos,
            'countqty' => $countqty,
            'boys' => $boys,
            'adults' => $adults,
            'girls' => $girls]);

//        $datos = Record::paginate(10);
//        return view('adultslist', ['datos' => $datos,'record' => $record]);

    }
}
