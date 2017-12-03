<?php 




require 'config/koneksi.php';

// Variables for the first page hit
	$start = 0;
	$page_counter = 0;
    $per_page = 8;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;


    // Check the page location with start value sent by get request and change variable values accordingly
	if(isset($_GET['start'])){
		$start = $_GET['start'];
		$page_counter =  $_GET['start'];
		$start = $start *  $per_page;
		$next = $page_counter + 1;
		$previous = $page_counter - 1;
	}
	
	$sql = "SELECT id,message FROM messages LIMIT $start, $per_page";
	
	$sql = "SELECT * FROM agenda order by id desc LIMIT $start, $per_page"; 
	$rs_result = mysql_query ($sql); //run the query
?> 


