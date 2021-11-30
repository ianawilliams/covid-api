<?php
	header("Access-Control-Allow-Origin: *");
	
	require '../functions.php';
	
	$start_date = getStart();
	$end_date = getEnd();

	$health_authority = getHealthAuthority();
	$health_region = getHealthRegion();

	$caseDataFile = 'BCCDC_COVID19_Regional_Summary_Data.csv';
	$fileURL = '../data/' . $caseDataFile;
	
	$data = getFileData( $fileURL );
	
	$results = getResults( $data, $start_date, $end_date, $health_authority, $health_region );

	echo json_encode( $results );
?>