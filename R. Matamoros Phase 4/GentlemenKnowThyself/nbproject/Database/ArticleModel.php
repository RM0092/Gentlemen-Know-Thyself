<?php

require ("ArticleEntity.php");

class ArticleModel {

    //Get articleEntity objects from the database and return them in an array.
   function GetArticleByCategory($category) {
        
$host = "localhost";
$user = "root";
$passwd = "";
$database = "gentlemen_know_thyself";
        //Open connection and Select database.     
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
        $query = "SELECT * FROM articles WHERE category LIKE '$category'";
        $result = mysql_query($query) or die(mysql_error());
        $articleArray = array();
        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            $id = $row[1];
            $title = $row[2];
            $category = $row[3];
            $author_name = $row[4];
            $descrip = $row[5];
            //Create article objects and store them in an array.
            $article = new ArticleEntity(-1, $id, $title, $category, $author_name, $descrip);
            array_push($articleArray, $article);
        }
        //Close connection and return result
        mysql_close();
        return $articleArray;
    }
}

?>
