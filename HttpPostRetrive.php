<?php
	error_reporting(E_WARNING);
	$path		= "/path//";
	$pdoclass	= $path.'pdoclass.php';
	$logclass	= $path.'logclass.php';

	include ($pdoclass);
	include ($logclass);



if ($_GET['get']=='senddata') {

			 $data =  sendder_data();
			 print_r($data);
			 echo json_encode($data);

}elseif ($_GET['get']=='cekstatus') {

			$data = cekstatus();
			echo json_encode($data);
}





function sendder_data(){

							//define name variable
							$nik			= $_POST['nik'];
							$nama			= $_POST['nama'];
							$pin			= $_POST['pin'];
							$cabang			= $_POST['cabang'];
							$ipaddress		= $_POST['ip'];
							$typepabx		= $_POST['type'];
							$status			= $_POST['status'];
							$cost			= $_POST['cost'];

					$database =  new DB();

					$query    =  $database->query("SELECT nik FROM acc_temp WHERE nik='$nik'");


					if(count($query) == 1) {
						// update
						$update =$database->query("UPDATE acc_temp SET `nama` ='$nama', `pin`='$pin', `cabang`='$cabang', `pin`='$pin',
																		 											   `ip`='$ipaddress',`pabx`='$typepabx', `status`='$status',
																														 `cost`='$cost', `status_message` ='N', `description` = 'NEW'
																		 	WHERE `nik`='$nik'");
						if (!$update) {
								$return = array ('status_message' => 'f', 'description' => 'DB update error' );
						}else {
								$query    =  $database->query("SELECT status_message, description FROM acc_temp WHERE WHERE `nik`='$nik'");
								foreach ($query AS $key=>$data){ $ret = $data; }
								$return = $ret;
						}

					} else {

							$insert = $database->query("INSERT INTO acc_temp (`nik`, `nama`, `pin`, `cabang`, `ip`, `pabx`, `status`,`cost`, `status_message`, `description`)
																values('$nik', '$nama',  '$pin', '$cabang', '$ipaddress', '$typepabx', '$status', '$cost', 'N', 'New')
													 ");

					 		if (!$insert) {
										$return = array ('flag'  => 'insert', 'status' => 'f', 'description' => 'DB update error');
							}else {
										$query    =  $database->query("SELECT status_message, description FROM acc_temp WHERE `nik`='$nik'");
										foreach ($query AS $key=>$data){
														$ret = $data;
										}
										$return = $ret;
							}

					}

				return $return;
}



function cekstatus(){
		$id				= $_POST['id'];
		$database =  new DB();
		$query    =  $database->query("SELECT status_message, description FROM acc_temp WHERE transactionid='$id'");
		foreach ($query AS $key=>$data){
						$ret = $data;
		}


		return $ret;

}
?>
