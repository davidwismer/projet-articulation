<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index()
    {
        if (Auth::user() !== null) {
            $user = Auth::user();
            $userId = $user->id;
            $module_user = DB::select("select * from module_user where user_id = '$userId'");
            $branche_user = DB::select("select * from branche_user where user_id = '$userId'");
            $absences = DB::select("select * from absences where user_id = '$userId'");
<<<<<<< HEAD
            $notes = DB::select("select * from notes where user_id = '$userId'");
=======
            $notes = DB::table('notes')->where('user_id', '=', $userId)->get();
        } else {
            $module_user = DB::select("select * from module_user");
            $branche_user = DB::select("select * from branche_user");
            $absences = DB::select("select * from absences");
            $notes = DB::select("select * from notes");
>>>>>>> 8a681bbc05fccfe89c8706a2d5b588a0002d56c3
        }

        $users = DB::select('select * from users');
        $branches = DB::select('select * from branches');
        $modules = DB::select('select * from modules');
        $events = DB::select('select * from evenements');
        $cours = DB::select('select * from cours');
        $commentaires = DB::select('select * from commentaires');
        $filieres = DB::select('select * from filieres');
        $groups = DB::select('select * from groups');
        $roles = DB::select('select * from roles');
        $filiere_module = DB::select('select * from filiere_module');
<<<<<<< HEAD
        $module_user = DB::select("select * from module_user");
        $branche_user = DB::select("select * from branche_user");
        $absences = DB::select("select * from absences");
        $notes = DB::select("select * from notes");
=======

>>>>>>> 8a681bbc05fccfe89c8706a2d5b588a0002d56c3


        $datas = [
            'users' => $users,
            'branches' => $branches,
            'modules' => $modules,
            'events' => $events,
            'notes' => $notes,
            'cours' => $cours,
            'absences' => $absences,
            'commentaires' => $commentaires,
            'filieres' => $filieres,
            'groups' => $groups,
            'roles' => $roles,
            'filiere_module' => $filiere_module,
            'module_user' => $module_user,
            'branche_user' => $branche_user
        ];

        return view('vue', ['datas' => $datas]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 8a681bbc05fccfe89c8706a2d5b588a0002d56c3
