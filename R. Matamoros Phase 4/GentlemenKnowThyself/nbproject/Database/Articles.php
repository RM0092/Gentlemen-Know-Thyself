
        <?php
        require 'ArticleController.php';
        $ArticleController = new ArticleController();

    $articleTables = $ArticleController->CreateArticlesTables('%');

    //Output page data
$title = 'Articles overview';
$content = $ArticleController->CreateArticlesDropdownList(). $articleTables;

        include 'Template.php';
        ?>
  