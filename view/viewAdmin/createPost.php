<?php
    ob_start();
?>

		<h2>Création/modification des posts</h2>
        <form method="post" action="index.php?action=save">
            <label>Titre du post:<input type='text' name='title' class="form-control" value='<?php if (isset($_POST['id'])){echo $article->title();}?>'></label><br>
            <p>Contenu du post:</p>
            <textarea id="mytextarea" rows='20' name="content"><?php if (isset($_POST['id'])){echo $article->content();}?></textarea><br>
            <?php if (isset($_POST['id'])){?>
            <input type='hidden' name='id' value='<?php echo $_POST['id']?>'><?php 
            }?>
            <input type="submit" class="btn btn-primary">
        </form>
    <?php 
    $content = ob_get_clean();
	require ('template.php');