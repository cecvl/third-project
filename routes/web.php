<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');

//get - display post - send
