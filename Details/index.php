<?php

	require '../functions.php';
	
	$start_date = getStart();
	$end_date = getEnd();

	$health_authority = getHealthAuthority();
	$health_region = getHealthRegion();

	$caseDataFile = 'BCCDC_COVID19_Dashboard_Case_Details.csv';
	$fileURL = '../data/' . $caseDataFile;
	
	$data = getFileData( $fileURL );
	
	$results = getDetailsResults( $data, $start_date, $end_date, $health_authority, $health_region );
	
	
	var_dump($results);
	echo '</pre>';

	//echo json_encode( $results );
?>