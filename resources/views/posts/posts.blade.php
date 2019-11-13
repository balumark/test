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
                        @foreach($posts as $post)
                            <div class="col-md-12 col-md-offset-2 mt-3 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        {{$post->title}}
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <div>{!! substr(strip_tags($post->detail->post_body),0,150) !!}</div>
                                            <a href="{{route('getSinglePost',['id' => $post->id])}}">Tovább a cikkhez</a>
                                            <footer class="blockquote-footer">{{$post->detail->created_at}}</footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection