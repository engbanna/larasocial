@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=""row>

            <div class="col-md-6">
                <h4>Home/<a href="{{ URL::to($page) }}">{{ ucwords($page) }} </a></h4>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($object) && !empty($object))
                    <h2>{{ ucwords($page) }} Update </h2>
                    {!! Form::model($object, ['route' => [$page.'.update', $object->id] , 'method'=>'PUT']) !!}
                @else
                    <h2>{{ ucwords($page) }} Create </h2>
                    {!! Form::open(['url' => $page, 'method'=>'post']) !!}
                @endif

                @foreach($fields as $fieldName=>$field)
                    @if($field['type']=='textarea')
                        <div class="form-group">
                            {!! Form::label($fieldName, ucwords($fieldName)) !!}
                            {!! Form::textarea($fieldName, null, ['class'=>'form-control']) !!}
                        </div>
                    @elseif($field['type']=='boolean')
                        {!! Form::label($fieldName, ucwords($fieldName)) !!}
                        {!! Form::checkbox($fieldName, 1,true, ['class'=>'form-control']) !!}

                    @else
                    <div class="form-group">
                        {!! Form::label($fieldName, ucwords($fieldName)) !!}
                        {!! Form::text($fieldName, null, ['class'=>'form-control']) !!}
                    </div>
                    @endif
                @endforeach

                <div class="form-group">
                    {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>


    @endsection
