<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

class EnviarController extends Controller
{
    use Notifiable;

    public function index()
    {
      return view('ejemplo');
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

    public function SendEmployeeStore($token)
    {
      //  dd($number);
        if($token=='gg5g3453435'){
            $number ='6420652442';
        }elseif($token=='ssgdfgsdfggsererg'){
            $number ='6420652442';
        }
        $this->notify(new SendNotification("Te ocupamos en Caja 1","$number"));

        return redirect()->back();
    }
}
