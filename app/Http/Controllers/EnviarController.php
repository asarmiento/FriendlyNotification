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
        if($type != 1){
                $separar = explode("/",$data['code']);
            $codesD = explode('-',$separar[2]);
            $store  = TStore::where("code",$codesD[2])->first();
        }else{

           // echo json_encode("prueba".$data);
            $codesD = explode('-',$data);
           // echo json_encode("exacto ".COUNT($codesD));
            $store  = TStore::where("code",$codesD[2])->first();
        }
        
        $terminal =null;
if($store != null){
    $terminal = TTerminal::where('mac_address',$codesD[1])->where("store_id",$store->id)->first();
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


        return redirect()->back();
    }
    public function tkn($length)
    {

        if($length == NULL){ $length = 30; }
        $characters =
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString += $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }
}
