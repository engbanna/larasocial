@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=""row>

            <div class="col-md-6">
                <h4>Home/<a href="{{ URL::to($page) }}">{{ ucwords($page) }} </a></h4>

                    <h2>{{ ucwords($page) }} Show </h2>
                    {!! Form::model($object, ['route' => [$page.'.update', $object->id] , 'method'=>'PUT']) !!}

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

                {!! Form::close() !!}
            </div>
        </div>

    </div>


    @endsection
