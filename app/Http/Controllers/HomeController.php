<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $events = Event::paginate(6);
        $cats = Category::all();

        return view('home', ['events' => $events, 'cats' => $cats]);
    }
}
