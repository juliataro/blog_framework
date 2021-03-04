<?php


class Tags extends Controller
{

    public function __construct()
    {
        $this->tagsModel = $this->model('Tag');
        $this->postsModel = $this->model('Post');
        //echo 'Pages class is loaded <br>';
    }

    public function index(){
        $tags = $this->tagsModel->getTags();
        $data = array(
            'tags'=> $tags
        );
        $this->view('tags/index', $data);
    }

    // function to ask one tag posts  if it's cliked on the tag link
    public function show($id)
    {
        $tags = $this->tagsModel->getPostTags($id);
        $posts = $this->postsModel->getPostByTag($id);

        $data = array(
            'tags' => $tags,
            'post' => $posts
        );
        $this->view('tags/show', $data);
    }

    // function to choose posts on chosen tags  if it's selected in select bar
    public function choice($id)
    {
        $post = $this->postsModel->getPostById($id);
        $tags = $this->tagsModel->getPostTags($id);
        $data = array(
            'post' => $post,
            'tags' => $tags
        );
        $this->view('posts/show', $data);
    }


}