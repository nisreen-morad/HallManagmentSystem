<?php

namespace Database\Seeders;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
       
        // إنشاء 10 غرف افتراضية
        $rooms = [
            ['code' => 'A101', 'name' => 'Physics Lab', 'status' => 'available'],
            ['code' => 'A102', 'name' => 'Chemistry Lab', 'status' => 'busy'],
            ['code' => 'A103', 'name' => 'Biology Lab', 'status' => 'available'],
            ['code' => 'B201', 'name' => 'Math Classroom', 'status' => 'available'],
            ['code' => 'B202', 'name' => 'Computer Lab', 'status' => 'busy'],
            ['code' => 'B203', 'name' => 'English Classroom', 'status' => 'available'],
            ['code' => 'C301', 'name' => 'History Classroom', 'status' => 'maintenance'],
            ['code' => 'C302', 'name' => 'Geography Classroom', 'status' => 'available'],
            ['code' => 'C303', 'name' => 'Art Room', 'status' => 'available'],
            ['code' => 'D401', 'name' => 'Music Room', 'status' => 'busy'],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
