<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>

<meta name="keywords" content="" />
<meta name="description" content="" />

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

<link rel="stylesheet" type="text/css" href="styles/styles.css" />

<title>RIA1 - Gallery</title>

</head>

<body>
	
<?php
function img_aleatoire($rep) {
    $dir=opendir($rep);
	$tab=array();
    while($file=readdir($dir))
    {
		//on vérifie que c'est bien une image
		if(substr(strtolower($file),-4)=='.jpg' || substr(strtolower($file),-4)=='.png'){
			$tab[]=$file;
		}
    }
    closedir($dir);
	mt_srand((double)microtime()*1000000);
	return($tab[mt_rand(0,count($tab)-1)]);
}
?>

	<div id="galeries"><?php
		$dossier = 'images/gallery';
		$dir = rtrim ($dossier, '/');
		if (is_dir ($dir)){
			$dh = opendir ($dir);
		}
		else {
			throw new Exception($dir . " n'est pas un repertoire valide!");
		}
		while(($file = readdir ($dh)) !== false ){
			if($file !== '.' && $file !== '..'){
				$path = $dir.'/'.$file;
				if(is_dir($path)){
					echo '<div>';
					echo '<h1>'.$file.'</h1>';
					echo '<a class="galOpen" href="#" title=""  rel="'.$path.'">';
					echo '<img src="'.$path.'/medium/'.img_aleatoire($path.'/medium/').'" />';
					echo '</a>';
					echo '</div>';
				}
			}
		}?>

	<div id ="overlay"  ></div>	

	<div id ="imageBox"></div>





 		<script type="text/javascript" src="../scripts/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../scripts/proxy.php"></script>
        <script type="text/javascript" src="../scripts/script.js"></script>

</body>

</html>