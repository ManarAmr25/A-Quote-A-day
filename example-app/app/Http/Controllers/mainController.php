<?php

namespace App\Http\Controllers;

use App\Http\Models\Quote;
use App\Models\Quote as ModelsQuote;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class mainController extends Controller
{
    //returns the main page with a random quote from database
    public function index()
    {
        $quotes = DB::table('quotes')->inRandomOrder()->limit(1)->get();
        //return $quotes;
        return view('welcome', ['quotes' => $quotes]);
        return 'hello';
    }

    //add a user added quote to database if quote & quotee is not empty
    public function add(Request $request)
    {
        $request->validate([
            'add1' => 'required',
            'add2' => 'required'
        ]);
        $q = new ModelsQuote();
        $q->quotee = $request->add1;
        $q->quote = $request->add2;
        $q->save();
        $quotes = [$q];
        return view('welcome', ['quotes' => $quotes]);
        //$quotes = DB::table('quotes')->where('quote', $request->find2)->limit(1)->get();
        //return view('welcome', ['quotes' => $quotes]);
    }

    //find the first quote by the gived quotee and return the welcome view with the found quote
    public function find(Request $request)
    {
        $quotes = DB::table('quotes')->where('quote', $request->find2)->limit(1)->get();
        return view('welcome', ['quotes' => $quotes]);
    }
}
