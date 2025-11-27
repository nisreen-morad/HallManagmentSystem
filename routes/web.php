<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/rooms');
}); 

// صفحة عرض جميع الغرف
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

// صفحة إضافة غرفة جديدة
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');

// حفظ الغرفة الجديدة
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

// عرض غرفة محددة
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');

// تعديل غرفة
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');

// حذف غرفة
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

//روت تاكيد حذف الغرفه
Route::get('/rooms/{id}/delete', [RoomController::class, 'deletePage'])->name('rooms.deletePage');



