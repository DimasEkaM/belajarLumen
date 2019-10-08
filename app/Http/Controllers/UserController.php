<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware("login");
		return "Belajar Controller di Lumen";
	}

	public function index(){
		return "Halo ini berasal dari controller user";
	}

	public function getIndexViews(){
		return view('user');
	}

}