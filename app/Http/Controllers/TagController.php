<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagPost;
use App\Repositories\TagRepositoryEloquent as TagRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TagController extends MyController
{
    protected $repository;
    protected $page;
    protected $fields;

    public function __construct(TagRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->page = 'tags';
        $this->fields = ['title'=>['type'=>'text'], 'slug'=>['type'=>'text'],
            'description'=>['type'=>'textarea'],
        ];
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagPost $request)
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
    public function update(StoreTagPost $request, $id)
    {
        $post = $this->repository->update(Input::all(), $id);
        $request->session()->flash('message', 'Task was successful!');
        return redirect($this->page);
    }


}
