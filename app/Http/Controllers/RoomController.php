<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    //
    public function index() {
    $rooms = Room::all();
     return view('rooms.index', compact('rooms'));
    }
    public function store(Request $request)
    {
        return Room::create($request->all());
    }

    public function show($id)
    {
        return Room::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return $room;
    }

    public function destroy($id)
{
    Room::destroy($id);
    return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
}

    public function deletePage($id)
{
    $room = Room::findOrFail($id);
    return view('rooms.delete', compact('room'));
}

}
