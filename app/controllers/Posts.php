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

    //controller function for delete one post option

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

    // function for Edit one post option

    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'id' => $id,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'content_err' => ''
            );
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Please enter content text';
            }

            // If there is No mistake, then turn to PostsModel and ask function editPost and edit and display message Post Updated
            if (empty($data['title_err']) and empty($data['content_err'])) {
                if ($this->postsModel->editPost($data)) {
                    message('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/edit', $data);
            }

        } else {

            //if user not the same that is in SESSION  then send user to posts page
            $post = $this->postsModel->getPostById($id);
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            $data = array(
                'id' => $id,
                'title' => $post->title,
                'content' => $post->content
            );
            $this->view('posts/edit', $data);
        }
    }

    // Funktion to add Post

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'content_err' => ''
            );
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Please enter content text';
            }
            if (empty($data['title_err']) and empty($data['content_err'])) {
                if ($this->postsModel->addPost($data)) {
                    message('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/add', $data);
            }

        } else {
            $data = array(
                'title' => '',
                'content' => ''
            );
            $this->view('posts/add', $data);
        }
    }



}