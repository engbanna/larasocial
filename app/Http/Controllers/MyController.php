<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryEloquent as CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    protected $model;
    protected $repository;
    protected $page;
    protected $fields;

    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->page = 'categories';
        $this->fields = ['id', 'title'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = $this->repository->orderBy('id', 'asc')->all();
        return view('cp.list', ['objects'=>$objects, 'fields'=>$this->fields, 'page'=>$this->page  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Create Form';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
