<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>This is the article list page</h2>
    
    <?php if(count($articles)):?>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
    <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= $article->article_title;?></td>
                <td><?= $article->article_body;?></td>
            </tr>
            <?php }?>
        </table>
    <?php  else:
        // $abhi = "Abhishek";
        // You can also write the php variables inside a string also like below
        // echo "No articles Found {$abhi}";
        echo "No articles Found"; ?>
    <?php endif; ?>

   <!-- <a href="<?=base_url('users/logout')?> ">Logout</a> -->
   <!-- You can also use the codeigniter anchor function -->
   <!-- First argument is the url like controller and function and the second is the text show up in inside the anchor tag -->
   <?= anchor('users/logout','Logout')?>
</body>
</html>