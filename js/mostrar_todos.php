<?php

	$url = 'data-1.json'; // path to your JSON file
	$data = file_get_contents($url); // put the contents of the file into a variable
	$characters = json_decode($data); // decode the JSON feed
	
	//echo $characters[0]->name;
	
	foreach ($characters as $character) {
		echo $character->name . '<br>';
	}
?>