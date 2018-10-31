<?php 
ob_start();
  

    ?>
	 <div class="row">
                    
     <div class="article">
         <h2><?php echo $article->title(); ?> par <?php echo $article->author();?></h2>
         <p><em>publié le 24/05/98 à 18:50:50</em></p>
         <p><?php echo $article->content();?></p>
     <hr class="sepa">
      </div>
     </div>
     <?php 

$coucou = ob_get_clean();

require ('view/template.php');