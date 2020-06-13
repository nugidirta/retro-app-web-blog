<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;

use Illuminate\Support\Facades\Auth;

class ProfileController extends BackendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{

        $this->data = [];

        $this->data['n_logged'] = Auth::user();
        $this->data['n_publis'] = Post::where("author_id", "=", Auth::user()->id)->count();        

	    return view('backend.profile', $this->data);
	}
}
