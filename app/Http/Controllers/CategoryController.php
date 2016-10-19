<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Http\Requests\StoreCategoryPost;
use App\Repositories\CategoryRepositoryEloquent as CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CategoryController extends MyController
{
    protected $repository;
    protected $page;
    protected $fields;

    public function __construct(CategoryRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->page = 'categories';
        $this->fields = ['title'=>['type'=>'text'], 'slug'=>['type'=>'text'],
            'description'=>['type'=>'textarea'],
            'confirmed'=>['type'=>'boolean'],
        ];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, $id)
    {
        $post = $this->repository->update(Input::all(), $id);
        $request->session()->flash('message', 'Task was successful!');
        return redirect($this->page);
    }


}
