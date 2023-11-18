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
        $this->notify(new SendNotification('hola'));
    }
}
