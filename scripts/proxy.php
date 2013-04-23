<?php
$tabImg = array();
if(isset($_REQUEST["dir"]) && $_REQUEST["dir"] != ""){
	$smallDir = rawurldecode('../'.$_REQUEST["dir"]);
	if (is_dir ($smallDir)){
		$dh = opendir ($smallDir);
	}
	else {
		throw new Exception($smallDir . ' n\'est pas un repertoire valide');
	}
	while(($file = readdir ($dh)) !== false ){
		if (is_file($smallDir.'/'.$file) === true) {
			$info = pathinfo($file); 
			$ext = strtolower($info['extension']);
			if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
				$tabImg[] = $file;
			}
		}
	}
}
echo json_encode($tabImg);
?>