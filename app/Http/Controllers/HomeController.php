<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryEloquent as PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @var PostRepository
     */
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = $this->postRepository->orderBy('id', 'desc')->all();
        return view('home', ['posts'=>$posts]);

    }
}
