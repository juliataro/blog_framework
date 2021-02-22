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

    //controller function for delete post option

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postsModel->getPostById($id);
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');;
            }
            if ($this->postsModel->deletePost($id)) {
                message('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }

}