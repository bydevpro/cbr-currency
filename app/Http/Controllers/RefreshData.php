<?php

namespace App\Http\Controllers;
use App\Models\CbrCurrency;
use Illuminate\Http\Request;

class RefreshData extends Controller
{
    //
    public function get()
    {
        //
        $data = CbrCurrency::all();
        return response()->json($data);
    }


}
