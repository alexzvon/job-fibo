<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiboController;

Route::get('/', [FiboController::class, 'index']);
