<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $events = Event::where('status', 'accepted')->get();

        return view('home', compact('events'));
    }
}
