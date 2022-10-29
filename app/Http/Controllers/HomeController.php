<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use PharIo\Manifest\Author;
use Illuminate\Support\Carbon;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


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


        $date = Carbon::now()->subYears(18)->firstOfYear();
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
    public function boyslist(Record $record)
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

        $datos = Person::query()
            ->with([                'record'            ])
            ->where('dob', '>=', $date)
            ->where('gender', 'M')
//            ->toSql();
            ->paginate(10);

//        dd($datos);
        return view('boyslist', ['datos' => $datos,
            'countqty' => $countqty,
            'boys' => $boys,
            'adults' => $adults,
            'girls' => $girls]);

//        $datos = Record::paginate(10);
//        return view('adultslist', ['datos' => $datos,'record' => $record]);

    }
    public function girlslist(Record $record)
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();

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

        $datos = Person::query()
            ->with([                'record'            ])
            ->where('dob', '>=', $date)
            ->where('gender', 'F')
//            ->toSql();
            ->paginate(10);

        return view('girlslist', ['datos' => $datos,
            'countqty' => $countqty,
            'boys' => $boys,
            'adults' => $adults,
            'girls' => $girls]);


    }
    public function totallist(Record $record)
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();

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
        $datos = Person::paginate(10);
        return view('totallist', ['datos' => $datos,
            'countqty' => $countqty,
            'boys' => $boys,
            'adults' => $adults,
            'girls' => $girls]);


    }
    public function pdf()
    {
        $datos = Person::all();
        view()->share('datos', $datos);
        $pdf = PDF::loadView('pdf.list_t', ['datos'=> $datos]);
        return $pdf->stream();

    }
    public function adultspdf()
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();

        $adults = Person::query()
            ->where('dob', '<=', $date)
            ->get();

//        $adults = Person::all();
        view()->share('adults', $adults);
        $pdf = PDF::loadView('pdf.list_a', ['adults'=> $adults]);
        return $pdf->stream();

    }
    public function boyspdf()
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();
        $boys = Person::where('gender', 'M')
            ->where('dob', '>=', $date)
            ->get();
        view()->share('boys', $boys);
        $pdf = PDF::loadView('pdf.list_b', ['boys'=> $boys]);
        return $pdf->stream();

    }
    public function girlspdf()
    {
        $date = Carbon::now()->subYears(18)->firstOfYear();
        $girls = Person::where('gender', 'F')
            ->where('dob', '>=', $date)
            ->get();
        view()->share('girls', $girls);
        $pdf = PDF::loadView('pdf.list_g', ['boys'=> $girls]);
        return $pdf->stream();

    }
}
