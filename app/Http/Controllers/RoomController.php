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

          // إضافة صفحة إنشاء غرفة جديدة
    public function create() {
    return view('rooms.add'); // هنا اسم ملف Blade الخاص بواجهة إضافة الغرفة
}


   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|in:available,busy,maintenance',
    ]);

    Room::create([
        'name' => $request->name,
        'status' => $request->status,
        'code' => 'R' . rand(1000, 9999), // هذا السطر أضفناه هنا
    ]);

    return redirect()->route('rooms.index')->with('success', 'Room added successfully!');
}


    public function show($id)
    {
        return Room::findOrFail($id);
    }

    public function edit($id)
{
    $room = Room::findOrFail($id);
    return view('rooms.edit', compact('room'));
}

   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'nullable|string|in:available,busy,maintenance',
    ]);

    $room = Room::findOrFail($id);
    $room->update($request->only(['name','status']));

    return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
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
