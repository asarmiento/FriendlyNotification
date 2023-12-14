<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\TStore;
use App\Models\TTerminal;
use Illuminate\Http\Request;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

class EnviarController extends Controller
{
    use Notifiable;

    public function index($terminal)
    {

        $terminal = $this->searchBox($terminal,1);
        return view('ejemplo',compact('terminal'));
    }

    public function sendParams()
    {
        //  return  session("code");
    }

    public function convetParams($code)
    {


        // session('code',$code);
    }
    public function store(Request $request)
    {
        $this->notify(new SendNotification($request->get('message'),'-4022931253'));

        return redirect()->back();
    }

    public function Sendstore()
    {
        $this->notify(new SendNotification("Se ocupa Cambio en Caja 1 L500",'-4022931253'));

        return redirect()->back();
    }

    public function searchBox($data,$type)
    {
        $codesD =substr($data['code'],0,2);
        $codesT =substr($data['code'],2,2);
        if($type != 1){
           /* $separar = explode("/",$data['code']);
            $codesD = explode('-',$separar[2]);*/

            $store  = TStore::where("code",$codesD)->first();
        }else{

            // echo json_encode("prueba".$data);
           // $codesD = explode('-',$data);
            // echo json_encode("exacto ".COUNT($codesD));
            $store  = TStore::where("code",$codesD)->first();
        }
        echo json_encode("exacto ".json_encode($codesD)." ".$codesT);
        $terminal =null;
        if($store != null){
            $terminal = TTerminal::where('mac_address',$codesT)->where("store_id",$store->id)->first();
        }

        return ["store"=>$store,"terminal"=>$terminal];
    }

    public function SendEmployeeStore(Request $request)
    {
        $data = $request->all();
        //echo json_encode(($data));
        $type = $data['type'];
        $dataRev = $this->searchBox($data,0);
        // echo json_encode(($terminal));
        if($dataRev['terminal'] != null){
        $text = "Se le solicita en Caja ".$dataRev['terminal']->mac_address;
        if($type ==1){
            $text = "Se le solicita cambio de 500 en Caja ".$dataRev['terminal']->mac_address;
        }
        $employees = Employees::where("store_id",$dataRev['store']->id)->where("type","Supervisor")->get();
        if($dataRev['terminal'] != null){
            foreach ($employees AS $employee){
                $idTelegram =$employee->id_telegram;
                $this->notify(new SendNotification($text,"$idTelegram"));
            }
        }
            return response()->json(["message"=>" fue enviado con extio"],200);
}

        return response()->json(["message"=>"no se encuentra la terminal"],422);
    }


}
