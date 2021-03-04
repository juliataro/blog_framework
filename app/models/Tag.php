<?php


class Tag
{
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    //get all tags for index view

    public function getTags()
    {
        $this->db->query('SELECT * FROM tags');
        $result = $this->db->getAll();
        return $result;
    }

    // Get One tag

    public function getTagById($id)
    {
        $this->db->query('SELECT * FROM tags WHERE id=:id');
        $this->db->bind(':id', $id);
        $post = $this->db->getOne();
        return $post;
    }

    //get POSTS WITH TAGS

    public function getPostTags($id){
        $this->db->query('
        SELECT*FROM tags 
        INNER JOIN post_tags 
        ON post_tags.tag_id=tags.id
        WHERE post_tags.post_id=:id'
        );
        $this->db->bind(':id', $id);
        $result = $this->db->getAll();
        return $result;
    }



}