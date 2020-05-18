<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
 	public function getAllPost()
 	{
 		$dataPosts = Posts::all();
 		return $dataPosts;
 	}
}
