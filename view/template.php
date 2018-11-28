
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $title;?></title>
<link rel="stylesheet" href="utilitaire/style.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
</head>

<body>

<div class="container flex">
	<div class='row'>
		<div class="md-col-6 col-sm-12">
		<h1 class='mainTitle'>JEAN FORTEROCHE</h1>
		</div>
        <div class="main_menu md-col-6 col-sm-12">
        <ul>
        <li><a href='index.php'><i class="fas fa-home"></i> Accueil</a></li>
        <li><a href='index.php?action=about'>À propos</a></li>
        <li><a href='index.php?action=contact'>Contact</a></li>
        
		</ul>
		</div>
	</div>
</div>

<header>
<div class="container-fluid image">

<h1 class="titre">Billet simple pour l'Alaska</h1>
   </header> 
        </div>
        <section>
            <div class="container">
                <?php echo $content;?>
            </div>
        </section>
    <footer>
    	<div class='container '>
    		<div class='row socialLink'>
    			<div class='col-md-12'>
    				<p class="socialLinkTitle">Mes réseaux sociaux</p>
    				<p ><a href="http://www.facebook.com"><i class="fab fa-facebook"></i></a> <a href="http://www.twitter.com"><i class="fab fa-twitter"></i></a></p>
    			</div>
    		</div>
    		<div class='row'>
    			<div class='col-md-12'>
    				<p><a href='admin/index.php'>admin</a></p>
    			</div>
    		</div>
    	</div>
    	
    	
    </footer>
    </body>
</html>
