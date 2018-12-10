<?php

ob_start();
?>
<div class="col-md-12">
        <h2>Formulaire de Contact</h2>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="comment" method='post' action='index.php?action=sendMail'>
            <label>Votre Email :<input type="email" name="mail" class="form-control"></label><br>
            <label>Votre message :<textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" cols="150" name='message'></textarea></label><br>
            <input type="submit" name="" class="btn btn-primary" ><br>
            
        </form>
        
	</div>
	
</div>
<?php 
$content = ob_get_clean();
$title = 'Jean Forteroche - contact';
require ('view/template.php');

