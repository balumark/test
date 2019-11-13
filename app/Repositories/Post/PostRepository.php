<?php

namespace App\Repositories\Post;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Posts\Posts;
use App\Models\Posts\PostsDetails;
/**
 * Class UserRepository.
 */
class PostRepository extends BaseRepository
{
  public function model()
  {
      return Posts::class;
  }

  public function savePost($request){

    $post = new Posts();

    $post->title=$request['title'];
    $post->active=0;
    $post->save();


    $postDetails = new PostsDetails();
    $postDetails->post_id=$post->id;
    $postDetails->post_body=$request['body'];
    $postDetails->save();

    return $postDetails;
  }

  public function updatePost($request){

    Posts::where('id', $request['id'])
        ->update([
            'title' => $request['title'],
            'active' =>$request['active']
        ]);


    return PostsDetails::where('post_id', $request['id'])
        ->update([
            'post_body' => $request['body']
        ]);
  }

  public function getPosts(){

    return Posts::where('active','=',1)->paginate(10);
  }

  public function getPostsEdit(){

    return Posts::paginate(10);
  }

  public function getSinglePost($id){

    return Posts::where('id','=',$id)->first();
  }

}
