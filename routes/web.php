<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Abdelrhman';

    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', [
        'name' => $name,
        'departments' => $departments,
    ]);
});

Route::post('/about', function (Request $request) {
    $name = $request->input('name');

    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', [
        'name' => $name,
        'departments' => $departments,
    ]);
});
Route::get('tasks', function () {
    return view('tasks');
});

Route::post('create', function () {

    $task_name = $_POST['name'];

    DB::table('tasks')->insert([
        'name' => $task_name
    ]);

    return view('tasks');

});

