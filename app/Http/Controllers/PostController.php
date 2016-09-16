<?php

namespace App\Http\Controllers;

use App\Repositories\ImagePostRepositoryEloquent;
use App\Repositories\PostRepositoryEloquent;
use App\Repositories\VideoPostRepositoryEloquent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    /**
     * @var PostRepository
     */
    protected $repository;
    protected $imagePostRepository;
    protected $videoPostRepository;

    public function __construct(
            PostRepositoryEloquent $repository,
            ImagePostRepositoryEloquent $imagePostRepository,
            VideoPostRepositoryEloquent $videoPostRepository)
    {
        $this->repository = $repository;
        $this->imagePostRepository = $imagePostRepository;
        $this->videoPostRepository = $videoPostRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->orderBy('id', 'desc')->all();
        return view('home', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd(Input::file('image'));
        $attrs['user_id'] =  \Auth::user()->id;
        $attrs['content'] =  $request->input('content');
        $attrs['post_type'] =  $request->input('post_type');

        $post = $this->repository->create($attrs);

        if($attrs['post_type'] == 'video'){

            $VideoAttrs['post_id'] =  $post->id;
            $VideoAttrs['url'] =  $request->input('url');
            $videoPost = $this->videoPostRepository->create($VideoAttrs);

        }

        if($attrs['post_type'] == 'image'){

            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                Session::flash('success', 'Upload successfully');
            }else{
                return Redirect::back();
            }

            $imageAttrs['post_id'] =  $post->id;
            $imageAttrs['url'] =  $fileName;

            $imageAttrs = $this->imagePostRepository->create($imageAttrs);

        }

        return Redirect::to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);
        return view('social/singlePost', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->repository->delete($id);
        return Redirect::to('home');
    }
}
