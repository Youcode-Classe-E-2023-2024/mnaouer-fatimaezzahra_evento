<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $picture = $request->file('picture');

        $filename = Str::random(20) . '.' . $picture->getClientOriginalExtension();
        $path = $picture->storeAs('images', $filename, 'public');

        $event = Event::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'started_at' => $request['started_at'],
            'location' => $request['location'],
            'tickets_available' => $request['tickets_available'],
            'created_by' => Auth::id(),
            'picture' => '/storage/' . $path,
        ]);

        return to_route('event.show', $event->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('user')->find($id);
        return view('event.details', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('event.edit');
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $new_status = $request->status;
        $event = Event::find($id);
        $event->status = $new_status;
        $event->save();

        return back()->with(['status' => 'Event status changed successfully.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile('picture')) {}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
