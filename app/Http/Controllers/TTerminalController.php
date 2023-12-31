<?php


namespace App\Http\Controllers;


use App\Models\TStore;
use App\Models\TTerminal;
use Illuminate\Http\Request;

class TTerminalController extends Controller
{

    public function index()
    {
        return view('terminal');
    }

    public function listsStore()
    {
        return TTerminal::with('tStore')->orderBy('store_id','ASC')->get();
    }

    public function codeTerminal($store)
    {
        return TTerminal::where("store_id",$store)->with('tStore')->count();
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $tStore =new TTerminal();
        $tStore->name = $data["name"];
        if($data["mac_address"] < 10) {
            $tStore->mac_address = "0" . $data["mac_address"];
        }else{
            $tStore->mac_address =$data["mac_address"];
       }
        $tStore->store_id = $data["store_id"];
        $tStore->save();

        return response()->json(['message'=>"Se registro con exito"],200);
    }
}
