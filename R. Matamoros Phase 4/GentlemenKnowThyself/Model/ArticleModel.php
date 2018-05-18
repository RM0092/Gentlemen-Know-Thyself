<?php

require ("Entity/ArticleEntity.php");

//Contains database related code for the Article page.
class ArticleModel {

    //Get all article types from the database and return them in an array.
    function GetArticleTypes() {
        require 'Credentials.php';

        //Open connection and Select database.   
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT category FROM article") or die(mysql_error());
        $types = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysql_close();
        return $types;
    }

    //Get articleEntity objects from the database and return them in an array.
    function GetArticleByType($type) {
        require 'Credentials.php';

        //Open connection and Select database.     
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM article WHERE type LIKE '$category'";
        $result = mysql_query($query) or die(mysql_error());
        $articleArray = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            $id = $row[1];
            $title = $row[2];
            $category = $row[3];
            $author_name = $row[4];
            $content = $row[5];

            //Create article objects and store them in an array.
            $article= new ArticleEntity(-1, $id, $title, $category, $author_nae , $content);
            array_push($articleArray, $article);
        }
        //Close connection and return result
        mysql_close();
        return $articleArray;
    }

}

?>
