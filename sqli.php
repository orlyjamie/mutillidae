<?php

	include('../../resources/dbconfig.php');
	$business_unit = $_POST['business_unit'];

	$contact_array = $contact_data = $names = $guids = array();

	$sql = "SELECT * FROM amb_contacts WHERE business_unit = '$business_unit'";
	$result = sqlsrv_query($conn, $sql);

	$i=0;
	while ($row=sqlsrv_fetch_array($result)) {
		$names[$i] = $row['name'];
		$guids[$i] = $row['guid'];

		$i++;
	}

	foreach ($names as $key => $contact) {
		$contact_data['name'] =  $names[$key];
		$contact_data['description'] = $guids[$key];

		array_push($contact_array,$contact_data);
	}

	echo json_encode($contact_array);

?>
