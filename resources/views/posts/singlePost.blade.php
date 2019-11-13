@extends('layouts.app')
@section('content')
    <div class="container">
        @if(\Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{\Session::get('error')}}
            </div>
        @elseif(\Session::has('flashMessage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{\Session::get('flashMessage')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="row">
                            <div class="col-md-12 col-md-offset-2 mt-3 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="mb-3 mt-1">{{$post->title}}</h1>
                                        <blockquote class="blockquote mb-0">
                                            {!!$post->detail->post_body !!}
                                            <footer class="blockquote-footer">{{$post->detail->created_at}}</footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection