<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $users=DB::select('select * from users');
        $events=DB::select('SELECT * FROM evenements');

       return view('vue', [
           'users' => $users,
           'events' => $events
        ]);

    }


}
