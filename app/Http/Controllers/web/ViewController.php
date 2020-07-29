<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserModel;

class ViewController extends Controller {
    public function index() {
        $users = UserModel::all();

        return view('index', compact('users'));
    }

    public function new() {
        return view('cadastrar');
    }

    public function edit() {
        return view('editar');
    }
}
