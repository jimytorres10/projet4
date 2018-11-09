<?php

ob_start();
foreach ($req as $value)
{
	?>
	 <div class="row">
                    
     <div class="article col-md-12">
         <h2><a href='index.php?action=post&amp;id=<?php echo $value->id();?>'><?php echo $value->title(); ?> par <?php echo $value->author();?></a></h2>
         <p><em>publié le <?php echo $value->jour();?>/<?php echo $value->mois(); ?>/<?php echo $value->annee();?> à <?php echo $value->heure();?>:<?php echo $value->minute();?></em></p>
         <p><?php echo $value->content();?></p>
     <hr class="sepa">
      </div>
     </div>
     <?php 
}
$content = ob_get_clean();
require ('view/template.php');

