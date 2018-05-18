<?php

class ArticleEntity
{
    public $id;
    public $title;
    public $category;
    public $author_name;
    public $content;
    
    function __construct($id, $title, $category, $author_name, $content) {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->author_name = $author_name;
        $this->content = $content;
    }

}

?>
