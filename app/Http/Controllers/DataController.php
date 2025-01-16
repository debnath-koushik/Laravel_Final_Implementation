<?php

namespace App\Http\Controllers;

use App\Models\TableModel1;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //showdata
    public function showdata() {
        $data = TableModel1::join('view_table2', 'view_table.phone_number','=','view_table2.phone_number')
                            ->select('view_table.uname', 'view_table.phone_number', 'view_table2.gmail', 'view_table2.address')
                            ->get();
        
        // return response()->json($data);
        return view('view', compact('data'));
    }
}
