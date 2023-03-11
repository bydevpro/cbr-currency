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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CbrCurrency $cbrCurrency)
    {
        //
        $parser = new CbrParserService();
    $data = $parser->parse();
    return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CbrCurrency $cbrCurrency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CbrCurrency $cbrCurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CbrCurrency $cbrCurrency)
    {
        //
    }
}
