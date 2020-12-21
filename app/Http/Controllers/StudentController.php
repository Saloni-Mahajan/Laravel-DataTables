<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;
use DB;

class StudentController extends Controller
{
    // public function index()
    // {
    //     return view('welcome');
    // }



    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(!empty($request->min && $request->max))
            {
                $data = DB::table('students')
                ->whereBetween('price', [$request->min, $request->max])->get();
               //    ->get();
                // return Product::whereBetween('price', [$request->min, $request->max])->get();
            }
            else
            {
                $data = Student::latest()->get();
            }
            return Datatables::of($data)->addIndexColumn()->make(true);
 
        }
    return view('welcome');
    }

}
