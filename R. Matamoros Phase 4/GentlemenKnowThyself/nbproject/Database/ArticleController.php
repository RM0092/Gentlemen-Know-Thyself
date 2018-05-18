<?php

require ("Mode/ArticleModel.php");

class ArticleController {

function CreateArticlesDropdownList() {
        $articleModel = new ArticleModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a category: 
                    <select name = 'category' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($categoryModel->GetCategoryTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }
    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
    function CreateArticlesTables($category)
    {
        $articleModel = new ArticleModel();
        $ArticleArray = $articleModel->GetArticleByCategory($category);
        $result = "";
        
        //Generate a articleTable for each articleEntity in array
        foreach ($articleArray as $key => $article) 
        {
            $result = $result .
                    "<table class = 'articles'>
                        <tr>
                            <th rowspan='6' width = '150px' ></th>
                            <th width = '75px' >Name: </th>
                            <td>$article->id</td>
                        </tr>
                        
                        <tr>
                            <th>Title: </th>
                            <td>$article->title</td>
                        </tr>
                        
                        <tr>
                            <th>Category: </th>
                            <td>$article->category</td>
                        </tr>
                        
                        <tr>
                            <th>Author_Name: </th>
                            <td>$article->author_name</td>
                        </tr>
                        
                        <tr>
                            <th>Descrip: </th>
                           <td colspan='2' >$article->descrip</td>
                        </tr>
                                        
                     </table>";
        }        
        return $result;
        
    }

}

?>
