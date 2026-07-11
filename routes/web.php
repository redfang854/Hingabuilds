<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects/neurovault', function () {
    return view('projects.neurovault');
})->name('projects.neurovault');

Route::get('/projects/half-priced-books', function () {
    return view('projects.half-priced-books');
})->name('projects.half-priced-books');

Route::get('/projects/apex', function () {
    return view('projects.apex');
})->name('projects.apex');
