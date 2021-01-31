<?php


class Pages extends Controller
{

    /**
     * Pages constructor.
     */
    public function __construct()
    {
        $this->pagesModel = $this->model('Page');
        //echo 'Pages class is loaded <br>';
    }
    public function index(){
        //echo 'Index method is loaded<br>;
        $data = array(
            'title'=>'Welcome to Pages',
            'content'=>'Pages index view is loaded by MVC'
        );
        $this->view('pages/index', $data);
    }

}