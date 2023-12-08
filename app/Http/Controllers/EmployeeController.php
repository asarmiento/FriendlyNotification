<?php


namespace App\Http\Controllers;


use App\Models\Employees;
use App\Models\TStore;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('employees');
    }

    public function listsStore()
    {
        return Employees::with('tStore')->get();
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $tStore =new Employees();
        $tStore->name = $data["name"];
        $tStore->id_telegram = $data["id_telegram"];
        $tStore->type = $data["type"];
        $tStore->store_id = $data["store_id"];
        $tStore->save();

        return response()->json(['message'=>"Se registro con exito"],200);
    }
}
