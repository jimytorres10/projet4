<?php

ob_start();
foreach ($req as $value)
{
	?>
	 <div class="row">
                    
     <div class="article col-sm-12 col-md-12">
         <h2><a href='index.php?action=post&amp;id=<?php echo $value->id();?>'><?php echo $value->title(); ?> par <?php echo $value->author();?></a></h2>
         <p><em>publié le <?php echo $value->jour();?>/<?php echo $value->mois(); ?>/<?php echo $value->annee();?> à <?php echo $value->heure();?>:<?php if ($value->minute() <= 10) {echo '0'.$value->minute();}
         else{echo $value->minute();}
         ?></em></p>
         <p><?php echo substr($value->content(),0,300);?> ... <a href='index.php?action=post&amp;id=<?php echo $value->id();?>'>lire la suite</a></p>
      </div>
     </div>
     <?php 
}
$content = ob_get_clean();
$title = 'Jean Forteroche - Billet simple pour l\'Alaska';
require ('view/template.php');

