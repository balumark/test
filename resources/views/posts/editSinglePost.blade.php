@extends('layouts.app')
@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection
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
                        <h1>Szerkesztés</h1>
                        <form class="col-md-12" enctype="multipart/form-data" method="post" action="{{route('updatePost')}}">
                            {{ csrf_field() }}
                            <div class="col-md-12 col-md-offset-2">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Post címe: </span>
                                    </div>
                                    <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-md-offset-2">
                                <textarea name="body">{{$post->detail->post_body}}</textarea>
                            </div>
                            <div class="col-md-12 col-md-offset-2">
                                <select class="form-control mt-3 mb-3" name="active">
                                    <option value="1">aktív</option>
                                    <option value="0">nem aktív</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <div class="col-md-12 col-md-offset-2 mt-5 float-right">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection