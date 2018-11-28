<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>admin</title>
	    <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
          <script>
          tinymce.init({
            selector: '#mytextarea'
          });
  		</script>
    </head>

    <body>
    <div class='container header'>
    	<div class='col-md-12 '>
    		<h1 class='title'>Billet simple pour l'Alaska: admin</h1>
    	</div>
    </div>
    <div class="container">
        <?php echo $content; ?>
    </div>
    </body>
</html>