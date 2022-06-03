<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $users=DB::select('select * from users');
        $branches=DB::select('select * from branches');

        return view('vue', ['users' => $users], ['branches' => $branches]);

    }


}
