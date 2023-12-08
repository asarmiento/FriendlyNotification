<?php


namespace App\Http\Controllers;


use App\Models\TStore;
use Illuminate\Http\Request;

class TStoreController extends Controller
{

    public function index()
    {
        return view('Store');
    }

    public function listsStore()
    {
        return TStore::all();
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $tStore =new TStore();
        $tStore->name = $data["name"];
        $tStore->save();

        return response()->json(['message'=>"Se registro con exito"],200);
    }
}
