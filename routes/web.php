<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects/neurovault', function () {
    return view('projects.neurovault');
})->name('projects.neurovault');

Route::get('/projects/half-priced-books', function () {
    $data = json_decode(file_get_contents(resource_path('data/half-priced-books.json')), true);

    return view('projects.half-priced-books', [
        'groups' => $data['groups'],
        'items' => collect($data['items']),
    ]);
})->name('projects.half-priced-books');

Route::get('/projects/half-priced-books/{slug}', function (string $slug) {
    $items = json_decode(file_get_contents(resource_path('data/half-priced-books.json')), true)['items'];
    $i = array_search($slug, array_column($items, 'slug'), true);
    abort_if($i === false, 404);

    return view('projects.half-priced-books-item', [
        'item' => $items[$i],
        'prev' => $items[$i - 1] ?? null,
        'next' => $items[$i + 1] ?? null,
    ]);
})->name('projects.half-priced-books.show');

Route::get('/projects/apex', function () {
    return view('projects.apex');
})->name('projects.apex');
