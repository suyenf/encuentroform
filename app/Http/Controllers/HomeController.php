<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

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
     */
    public function index()
    {
//        $record = DB::table('records');
////            ->select(DB::raw('sum(qty)'));
//
//        $datos = Record::all();
//        return view('home', ['datos' => $datos,'record' => $record]);
        $countqty = Record::count();
        $boys = Person::where('gender','M')->count();
        $girls = Person::where('gender','F')->count();
        $datos = Record::paginate(10);
        return view('home', ['datos' => $datos,
                                  'countqty'=> $countqty,
                                  'boys' => $boys,
                                   'girls' => $girls]);

    }
}
