<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 2019. 11. 13.
 * Time: 11:04
 */

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Post\PostRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository=$postRepository;
    }

    public function createPostIndex(){
        return view('posts.index');
    }

    public function makePost(Request $request){
        $this->validate(request(), [
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $result = $this->postRepository->savePost($request);

        if($result){
            return redirect()->route('createPostIndex')->with('flashMessage', 'Sikeres blog post felvetel!');
        }else{
            return redirect()->route('createPostIndex')->with('error','Valami nincs rendben!');
        }
    }

    public function updatePost(Request $request){
        $this->validate(request(), [
            'title' => 'required|min:3',
            'body' => 'required',
            'active' => 'required|integer|min:0|max:1'
        ]);

        $result = $this->postRepository->updatePost($request);

        if($result){
            return redirect()->route('createPostIndex')->with('flashMessage', 'Sikeres blog post update!');
        }else{
            return redirect()->route('createPostIndex')->with('error','Valami nincs rendben!');
        }
    }

    public function showPosts(){
        $posts = $this->postRepository->getPosts();

        return view('posts.posts')->withPosts($posts);
    }
    public function editPosts(){
        $posts = $this->postRepository->getPostsEdit();

        return view('posts.editAllPosts')->withPosts($posts);
    }

    public function showSinglePost($id){
        $post = $this->postRepository->getSinglePost($id);
        if($post){
            return view('posts.singlePost')->withPost($post);
        }else{
            return redirect()->route('getPosts');
        }

    }
    public function editSinglePost($id){
        $post = $this->postRepository->getSinglePost($id);
        if($post){
            return view('posts.editSinglePost')->withPost($post);
        }else{
            return redirect()->route('editSinglePost');
        }

    }
}