<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
	public function __construct()
	{
		return "Belajar Controller di Lumen";
	}

	public function index(){
		return "Halo ini berasal dari controller user";
	}

	public function getIndexViews(){
		return view('user');
	}

}