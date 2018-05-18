<?php

class ArticleEntity
{
    public $id;
    public $title;
    public $category;
    public $author_name;
    public $descrip;
    
    function __construct($id, $title, $category, $author_name, $descrip) {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->author_name = $author_name;
        $this->descrip = $descrip;
}

}

?>

