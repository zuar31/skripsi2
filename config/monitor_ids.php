<?php
include '../config/database_snort.php';
date_default_timezone_set('Asia/Jakarta');
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$db=new DatabaseSnort();
	$data=$db->getConnection();
	// var_dump($data);
	$aColumns = array( 'sid','cid','signature','sig_name','ip_proto','ip_src','ip_dst','layer4_sport','layer4_dport','timestamp' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "sid";
	
	/* DB table to use */
	$sTable = "view_acid_event";
	
	/* Database connection information */
	// $gaSql['user']       = "root";
	// $gaSql['password']   = "root";
	// $gaSql['db']         = "snort";
	// $gaSql['server']     = "localhost";
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	// $gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
	// 	die( 'Could not open connection to server' );
	
	// mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
	// 	die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */

	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".$data->real_escape_string( $_GET['iDisplayStart'] ).", ".
			$data->real_escape_string( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".$data->real_escape_string(  $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".$data->real_escape_string(  $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".$data->real_escape_string( $_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	// $sQuery = "
	// 	SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
	// 	FROM   $sTable
	// 	$sWhere
	// 	$sOrder
	// 	$sLimit
	// ";
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		ORDER BY CID DESC
		$sLimit
	";
	// $rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$rResult = $data->query($sQuery);
	// var_dump($rResult);
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	// $rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$rResultFilterTotal = $data->query( $sQuery );
	// $aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$aResultFilterTotal = $rResultFilterTotal->fetch_array();
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	// $rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$rResultTotal = $data->query($sQuery);
	// var_dump($rResultTotal);
	// $aResultTotal = mysql_fetch_array($rResultTotal);
	$aResultTotal = $rResultTotal->fetch_array();
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow =  $rResult->fetch_array() )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
//			
			if ( $aColumns[$i] == "timestamp" )
			{
				 // Special output formatting for 'version' column 
				$row[] =  date('d-m-Y H:i:s',strtotime($aRow[ $aColumns[$i] ]));
			}

			else if($aColumns[$i]=="ip_src")
			{
				$row[] =  long2ip($aRow[ $aColumns[$i] ]);
			}

			else if($aColumns[$i]=="ip_dst")
			{
				$row[] =  long2ip($aRow[ $aColumns[$i] ]);
			}
		
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
			// else if($aColumns[$i]=='timestamp')
			// {
			// 	$row[] = $aRow[ date('d-m-Y H:i:s',strtotime($aColumns[$i])) ];
			// }
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
?>