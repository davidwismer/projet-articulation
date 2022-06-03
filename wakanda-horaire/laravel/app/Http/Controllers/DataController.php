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
        $modules=DB::select('select * from modules');

        $datas = [
            'users' => $users,
            'branches' => $branches,
            'modules' => $modules
        ];

        return view('vue', ['datas' => $datas]);
    }


}
