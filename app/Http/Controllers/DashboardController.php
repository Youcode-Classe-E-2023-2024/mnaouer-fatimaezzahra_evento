<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {

        $usersCount = User::count();
        $categoriesCount = Category::count();
        $StatusAccepted= Event::where('status','Accepted')->count();
        $StatusRejected= Event::where('status','Rejected')->count();

        return view('dashboard', compact('usersCount','categoriesCount','StatusAccepted','StatusRejected'));
    }

}
