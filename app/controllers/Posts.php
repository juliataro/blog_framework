<?php


class Posts extends Controller
{
    /**
     * Posts constructor.
     */
    public function __construct()
    {
        $this->postsModel = $this->model('Post');
        //echo 'Pages class is loaded <br>';
    }
    public function index(){
        $data = array(
            'posts'=> $posts
        );
        $this->view('posts/index', $data);

    }

}