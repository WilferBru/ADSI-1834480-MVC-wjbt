<?php 
	$dir = scandir("documents/".$id);
	$result = null;

	foreach ($dir as $key => $value) {
		if (!in_array($value, array(".",".."))) {
			$result[] = $value;
		}
		
	}

	foreach ($result as $value) {
		if (substr($value, -3) == 'pdf') {
			echo "<embed src='documents/$id/$value' type='application/pdf' width='100%' height='500px'>";
		}else{
			echo "<embed src='documents/$id/$value' type='image/jpg' width='100%' height='500px'>";
		}
	}
