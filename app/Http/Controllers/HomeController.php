<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $events = Event::with('category')->where('status', 'accepted')->get();
        $cats = Category::all();

        return view('home', compact('events', 'cats'));
    }
}
