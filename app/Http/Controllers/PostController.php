<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
	public function index(){
		$getPost = Post::OrderBy("id","DESC")->paginate(10);
		$out = [
			"message" => "list_post",
			"results" => $getPost,
		];

		return response()->json($out,200);
	}

	public function store(Request $request){
		
		if($request->isMethod('post')){
			$this->validate($request,[
				'title' => 'required',
				'body'	=> 'required'
			]);

			$title = $request->input('title');
			$body  = $request->input('body');

			$data = [
				'slug' => Str::slug($title,"-"),
				'title'=> $title,
				'body' => $body

			];

			$insert = Post::create($data);

			if($insert){
				$out = [
					"message" => "success_insert_data",
					"results" => $data,
					"code"	  => 200
				];
			} else {
				$out = [
					"message" => "failed_insert_data",
					"results" => $data,
					"code"	  => 404					
				];
			}

			return response()->json($out,$out['code']);					
		}
		
	}

}