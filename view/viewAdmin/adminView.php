<?php
    ob_start();
?>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Panneaux d'administration</h1>
            </div>
        </div>
    </div>
    <a href="index.php?action=form">Créer un nouvel article</a>
    <h2>Liste des articles</h2>
    <table>
    	<thead> 
       		<tr>
               <th>Titre</th>
               <th>Supprimer</th>
               <th>Modifier</th>
       		</tr>
   		</thead>
        <?php
        foreach ($req as $v)
        {
        ?>
        
        <tr>
        <td class='tallCol'><?= $v->title();?></td>
        <td class='smallCol'><a href="index.php?action=deleteArticle&amp;id= <?= $v->id();?>">Supprimer</a></td>
        <td class='smallCol'>
        	<form method='post' action='index.php?action=form'>
        		<input type='hidden' name='id' value='<?php  echo $v->id();?>'>
        		<input type='submit' value='Modifier' class="btn btn-primary">
        	</form>
        </td>
        </tr>
            
        <?php
        }
        
        ?>
        </table>
        <h2>Modération des commentaires</h2>
        <table>
        <thead> 
       		<tr>
               <th>Commentaire</th>
               <th>Signalements</th>
               <th>Supprimer</th>
               <th>Supprimer signalements</th>
       		</tr>
   		</thead>
        <?php
        foreach ($listComment as $w)
        {
        ?>
        
        <tr>
        <td class='tallCol'><p><?= $w->contentCom();?></p></td>
        <td class='smallCol'><?= $w->report();?></td>
        <td class='smallCol'><a href="index.php?action=deleteCom&amp;id=<?= $w->id();?>">Supprimer</a></td>
        <td class='smallCol'><a href="index.php?action=restartReport&amp;id=<?= $w->id();?>">Retirer les signalements</a></td>
        </tr>
            
        <?php
        }
        ?>
        </table>
        <?php 
    $content = ob_get_clean();
	require ('template.php');