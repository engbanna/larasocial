@extends('layouts.app')

<style>
    .post-content-details {
        font-size: 10px;
    }
    .post-content-body {
        font-size: 18px;
        font-weight: 600;
    }
    .post-form textarea {
        width: 90% !important;
    }
    .post-form input[type="text"] {
        width: 90%;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post Page</div>

                    <div class="panel-body">

                        @include('social.post-block', ['post' => $post])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
