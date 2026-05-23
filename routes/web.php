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
    $tasks = DB::table(table:'tasks')->get();
    return view('tasks',data :compact(var_name:'tasks'));
});

Route::post('create', function () {

    $task_name = $_POST['name'];

    DB::table('tasks')->insert([
        'name' => $task_name
    ]);

    return redirect()->back();

});

Route::post('delete/{id}', function ($id) {

    DB::table('tasks')
        ->where('id', $id)
        ->delete();

    return redirect()->back();

});

Route::post('edit/{id}', function ($id) {

    $task = DB::table('tasks')
        ->where('id', $id)
        ->first();

    $tasks = DB::table('tasks')
        ->get();

    return view('tasks', compact('task', 'tasks'));

});

Route::post('/update', function () {
    DB::table('tasks')
        ->where('id', request('id'))
        ->update([
            'name' => request('name'),
        ]);

    return redirect('/tasks');
});

