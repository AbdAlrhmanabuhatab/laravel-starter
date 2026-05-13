<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

