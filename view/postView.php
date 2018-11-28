<?php 

ob_start();
  

    ?>
	 <div class="row">
                    
     <div class="article col-md-12">
         <h2><?php echo $article->title(); ?> par <?php echo $article->author();?></h2>
         <p><em>publié le <?php echo $article->jour();?>/<?php echo $article->mois(); ?>/<?php echo $article->annee();?> à <?php echo $article->heure();?>:<?php if ($article->minute() <= 10) {echo '0'.$article->minute();}
         else{echo $article->minute();}?></em></p>
         <p><?php echo $article->content();?></p>
     <hr class="sepa">
      </div>
     </div>
     <h2 id='com'>Commentaires</h2>
     
     <?php 
     foreach ($comment as $value)
     {
         ?> 
         <div class="com col-md-12">
             <p>Commentaire de <strong><?php echo $value->author();?></strong> du <?php echo $value->jour();?>/<?php echo $value->mois(); ?>/<?php echo $value->annee();?> à <?php echo $value->heure();?>:<?php if ($value->minute() <= 10) {echo '0'.$value->minute();}
         else{echo $value->minute();}?></p>
             <p class="comText">" <?php echo $value->contentCom();?> "</p>
             <?php 
             if (isset($_SESSION['com'.$value->id()]) && $_SESSION['com'.$value->id()] == 'ok')
                {
                   ?> <p>commentaire signalé</p><?php 
                }
                else{?>
             <a href='index.php?action=reportCom&amp;id=<?php echo $value->id();?>'> Signaler ce commentaire</a>
         <?php }?>
         </div>
         <?php 
     }
     ?>
     
     <h2>Ajouter un commentaire</h2>
     <div class="row">
      	<div class="col-md-12">
          <form class="comment" method='post' action='index.php?action=com#com'>
              <label>Votre pseudo :<input required type="text" name="pseudo" class="form-control"></label><br>
              <label>Votre commentaire :<textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" cols="150" name='message'></textarea></label><br>
              <input type="submit" name="" class="btn btn-primary" ><br>
              <input type='hidden' name='id' value='<?php echo $article->id();?>'>
          </form>
     	</div>
     </div>
	<?php 
$content = ob_get_clean();
$title = 'Jean Forteroche -'.$article->title();
require ('view/template.php');
