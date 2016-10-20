<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{
    protected $repository;
    protected $page;
    protected $fields;
    protected $formFile;

    public function __construct()
    {
        $this->middleware('auth');
        $this->formView = 'form';
        $this->listView = 'list';
        $this->showView = 'show';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = $this->repository->orderBy('id', 'asc')->all();
        return view('cp.'.$this->listView , ['objects'=>$objects, 'fields'=>array_keys($this->fields), 'page'=>$this->page  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cp.'.$this->formView, ['object'=>[], 'fields'=>$this->fields, 'page'=>$this->page  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(StoreCategoryPost $request)
    {

        $post = $this->repository->create(Input::all());
        $request->session()->flash('message', 'Task was successful!');
        return redirect($this->page);

    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = $this->repository->find($id);
        return view('cp.'.$this->showView, ['object'=>$object, 'fields'=>$this->fields, 'page'=>$this->page  ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = $this->repository->find($id);
        return view('cp.'.$this->formView, ['object'=>$object, 'fields'=>$this->fields, 'page'=>$this->page  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(StoreCategoryPost $request, $id)
    {
        $post = $this->repository->update(Input::all(), $id);
        $request->session()->flash('message', 'Task was successful!');
        return redirect($this->page);
    }*/

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
