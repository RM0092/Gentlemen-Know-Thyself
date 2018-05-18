    <?php

require ("Model/articlesModel.php");

//Contains non-database related function for the articles page
class articlesController {

        function CreatearticlesDropdownList() {
            $articlesModel = new articlesModel();
            $result = "<form action = '' method = 'post' width = '200px'>
                        Please select a type: 
                        <select name = 'types' >
                            <option value = '%' >All</option>
                            " . $this->CreateOptionValues($articlesModel->GetarticlesTypes()) .
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
    
    function CreateArticlesTables($types)
    {
        $articlesModel = new articlesModel();
        $articlesArray = $articlesModel->GetarticlesByType($types);
        $result = "";
        
        //Generate a articlesTable for each articlesEntity in array
        foreach ($articlesArray as $key => $articles) 
        {
            $result = $result .
                    "<table class = 'articlesTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$articles->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$articles->title</td>
                        </tr>
                        
                        <tr>
                            <th>Category: </th>
                            <td>$articles->category</td>
                        </tr>
                        
                        <tr>
                            <th>Author_name: </th>
                            <td>$articles->author_name</td>
                        </tr>
                        
                        <tr>
                            <th>Content: </th>
                            <td colspan='2' >$articles->content</td>
                        </tr>
                      
                     </table>";
        }        
        return $result;
        
    }

}

?>
