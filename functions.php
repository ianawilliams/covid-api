<?php

function getFileData( $path ) {
	$data = '';

	$fileHandle = fopen( $path, 'r' );

	while(!feof($fileHandle)) {
		$line = fgets($fileHandle);
		$data .= $line;
	}

	fclose( $fileHandle );

	$results = [];
	
	$lines = explode(PHP_EOL, $data);

	foreach ($lines as $index => $line) {
	    if ( $index > 0) {
	    	array_push($results, explode(',', str_replace('"', '', $line)));
	    }
	}

	return $results;
} 

function getResults( $data, $start, $end,  $health_auth, $health_reg ) {
	$results = [];

	foreach( $data as $key => $item ) {
		$date = $item[0];
		$HA = $item[2];
		$region = $item[3];
		
		if ( $date >= $start && $date <= $end ) {

			if ( strcmp($HA, $health_auth) == 0 && strcmp($region, $health_reg) == 0 ) {	
				array_push($results, $item );
			}
		}
	}

	return $results;
}

function getDetailsResults( $data, $start, $end,  $health_auth, $health_reg ) {
	$results = [];

	echo '<pre>';
	foreach( $data as $key => $item ) {
		var_dump($item);
		// $date = $item[0];
		// $HA = $item[2];
		// $region = $item[3];
		
		// if ( $date >= $start && $date <= $end ) {

		// 	if ( strcmp($HA, $health_auth) == 0 && strcmp($region, $health_reg) == 0 ) {	
		// 		array_push($results, $item );
		// 	}
		// }
	}

	return $results;
}

function getStart() {
	if ( $_GET['start'] ) {
		return $_GET['start'];
	}
	else {
		return '2020-01-29';
	}
}

function getEnd() {
	if ( $_GET['end'] ) {
		return $_GET['end'];
	}
	else {
		return '2020-01-30';
	}
}

function getHealthAuthority() {
	if ( $_GET['HA'] ) {
		return $_GET['HA'];
	}
	else {
		return 'All';
	}
}

function getHealthRegion() {
	if ( $_GET['HR'] ) {
		return $_GET['HR'];
	}
	else {
		return 'All';
	}
}

?>