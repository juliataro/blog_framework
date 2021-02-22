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

    //this is for all posts
    public function index(){
        $posts = $this->postsModel->getPosts();
        $data = array(
            'posts'=> $posts
        );
        $this->view('posts/index', $data);
    }

    // function to ask one post  if it's cliked on the heading of exact post
    public function show($id)
    {
        $post = $this->postsModel->getPostById($id);
        $data = array(
            'post' => $post
        );
        $this->view('posts/show', $data);
    }

}