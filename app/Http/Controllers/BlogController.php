<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

/**
* Retro Apps
*
* @package  Laravel Retro Apps
* @author   Ketut Ugi Diranta <nugi.dirta@gmail.com>
*/


class BlogController extends Controller
{

	protected $limit = 5;

	public function index(){

		$posts = Post::with('author')
				->latestFirst()
				->published()
				->filter(request('term'))
				->paginate($this->limit);

		return view("blog.index", compact('posts'));
	}

	public function hello($name){
		return "Halo ".$name;
	}

	public function category(Category $category){
		$categoryName = $category->title;

		$posts = $category->posts()
						->with('author')
						->latestFirst()
						->published()
						->paginate($this->limit);

		return view("blog.index", compact('posts','categoryName'));
	}

	public function show(Post $post){

		// harus cek dulu
		$cekPost = Post::where('slug', $post->slug)->first();

		if (!$cekPost) {
			abort(404);
		}

		$post->increment('view_count',1);
		return view("blog.show", compact('post'));
	}

	public function author(User $author){
		$authorName = $author->name;

		$posts = $author->posts()
						->with('category')
						->latestFirst()
						->published()
						->paginate($this->limit);

		return view("blog.index", compact('posts','authorName'));
	}

	public function daftarisi(){

		$posts = Post::with('author')
				->latestFirst()
				->published()
				->filter(request('term'))
				->paginate();

		return view('blog.daftarisi', compact('posts'));
	}
}
