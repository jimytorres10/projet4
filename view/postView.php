<?php 
ob_start();
  

    ?>
	 <div class="row">
                    
     <div class="article col-md-12">
         <h2><?php echo $article->title(); ?> par <?php echo $article->author();?></h2>
         <p><em>publié le 24/05/98 à 18:50:50</em></p>
         <p><?php echo $article->content();?></p>
     <hr class="sepa">
      </div>
     </div>
     <h2>Commentaires</h2>
     <?php 
     foreach ($comment as $value)
     {
         ?> <p><?php echo $value->contentCom();?></p><?php 
     }
     ?>
     <h2>Ajouter un commentaire</h2>
     <div class="row">
      	<div class="col-md-12">
          <form class="comment" method='post' action='index.php?action=com'>
              <label>Votre pseudo :<input type="text" name="pseudo" class="form-control"></label><br>
              <label>Votre commentaire :<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="150" name='message'></textarea></label><br>
              <input type="submit" name="" class="btn btn-primary" ><br>
              <input type='hidden' name='id' value='<?php echo $article->id();?>'>
          </form>
     	</div>
     </div>
	<?php 
$content = ob_get_clean();

require ('view/template.php');
