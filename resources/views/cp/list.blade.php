@extends('layouts.app')

@section('content')
        <div class="container">

            <h2>{{ ucwords($page) }} List</h2>
            <h4> <a href="{{ URL::to($page.'/create/') }}">Add New</a></h4>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    @foreach($fields as $field)
                    <th>{{ ucwords($field) }}</th>
                    @endforeach
                        <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($objects as $object) <?php  //print_r($object); die() ?>
                <tr>
                    @foreach($fields as $field)
                        <td>{{ $object->$field }}</td>
                    @endforeach
                        <td>
                            <a href="{{ URL::to($page.'/'.$object->id.'/edit') }}">Edit</a> |
                            {!! Form::open(['url' => $page.'/'.$object->id, 'method' => 'DELETE' ]) !!}
                            {!! Form::submit('Delete', ['class' => 'deleteConfirm']) !!}
                            {!! Form::close() !!}

                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>


@endsection
