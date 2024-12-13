<?php

namespace App\Http\Controllers;

use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()  {
        return Inertia::render('Frontend/Home');
        // return Inertia::render('Welcome', [
        //     'canLogin' => Route::has('login'),
        //     'canRegister' => Route::has('register'),
        //     'laravelVersion' => Application::VERSION,
        //     'phpVersion' => PHP_VERSION,
        // ]);
        
    }

    public function Task() {
        return Inertia::render('Frontend/Task');
        // return Inertia::render('Frontend/Task',[
        //     'title'=>'Task Page',
        // ]);
    }
}
