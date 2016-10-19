<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryPost;
use App\Repositories\CategoryRepositoryEloquent as CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $repository;
    protected $page;
    protected $fields;

    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->page = 'categories';
        $this->fields = ['title'=>['type'=>'text'], 'slug'=>['type'=>'text'],
            'description'=>['type'=>'textarea'],
            'confirmed'=>['type'=>'boolean'],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = $this->repository->orderBy('id', 'asc')->all();
        return view('cp.list', ['objects'=>$objects, 'fields'=>array_keys($this->fields), 'page'=>$this->page  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cp.form', ['object'=>[], 'fields'=>$this->fields, 'page'=>$this->page  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {

        $post = $this->repository->create(Input::all());
        $request->session()->flash('message', 'Task was successful!');
        return redirect($this->page);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->repository->delete($id);
        Session::flash('message', 'Deleted successfuly!');
        return redirect($this->page);
    }
}
