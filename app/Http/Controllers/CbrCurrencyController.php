<?php

namespace App\Http\Controllers;

use App\Models\CbrCurrency;
use Illuminate\Http\Request;
use App\Services\CbrParserService;

class CbrCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currencies = CbrCurrency::all();
        return view('index', compact('currencies'));
    }

}