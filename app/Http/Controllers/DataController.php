<?php

namespace App\Http\Controllers;

use App\Models\TableModel1;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Validator;

class DataController extends Controller
{
    //showdata
    public function showdata() {
        $data = TableModel1::join('view_table2', 'view_table.phone_number','=','view_table2.phone_number')
                            ->select('view_table.uname', 'view_table.phone_number', 'view_table2.gmail', 'view_table2.address')
                            ->get();
        
        return response()->json($data);
        // return view('view', compact('data'));
    }

    public function download() {
        $data = TableModel1::join('view_table2', 'view_table.phone_number','=','view_table2.phone_number')
                            ->select('view_table.uname', 'view_table.phone_number', 'view_table2.gmail', 'view_table2.address')
                            ->get()
                            ->toArray();
        
        // dd($data);

        return (new FastExcel($data))->download('data.xlsx');
        // (new FastExcel($users))->export(storage_path('app/users.xlsx'));
    }

    public function upload(Request $req){

        $validation = Validator::make($req->all(), [
            'file' => 'required'
           ]);

        if($validation->passes())
        {
            $image = $req->file('file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            return response()->json([
                'success' => true,
                'message'   => 'Image Upload Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message'   => $validation->errors()->all(),
            ]);
        }
    }
}
