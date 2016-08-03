<?php
// welcome to cli post
echo "=============================================================================\n";
echo "                             WELCOM TO CLI Masterfreelance  \n";
echo " \n";
echo " \n";
echo "=============================================================================\n";
echo "pilih metode http post sender \n";
echo "1. HTTP SENDER DATA  (1) \n";
echo "2. CEK STATUS DATA (2) \n";
echo "===============================================================================\n";
echo "masukan pilihan anda ? ";

///  handle yes
$handle    = fopen ("php://stdin","r");
$line	     = fgets($handle);

if ($line == 1) {

  http_sender();

}else {

  echo cek_status();

}


//------------------------------------http sender ---------------------------------------------------------------------------
function http_sender () {

              echo "\n=============================================================================\n";
              echo "                             WELCOM TO HTTP POST SENDER  \n";
              echo " \n";
              echo " \n";
              echo "parameter yang di kirimkan : \n";
              echo "1. Nomor Induk Pegawai \n";
              echo "2. Nama Pegawai \n";
              echo "3. Pin Phone atau Ext Number \n";
              echo "4. Kantor Cabang \n";
              echo "5. Ip Address \n";
              echo "6. Type Pabx \n";
              echo "7. Status\n";
              echo "8. Cost Center \n";
              echo " \n";
              echo " \n";
              echo "=============================================================================\n";
              echo "Apakah Ingin Melanjutkan,  Jika ia ketikan 'yes'  ? ";


              ///  handle yes
              $handle    = fopen ("php://stdin","r");
              $line	   = fgets($handle);
              if(trim($line) == 'yes'){
                  echo " \n";
              	echo " \n";
              	echo "=============================================================================\n";
              	echo "Silakan masukan parameter sesuai urutan di atas \n";
              	echo "contoh : 123 sigit 1234 bandung 192.168.94.1 avaya online 50.000 \n";
              	echo "=============================================================================\n";

              	$parameter    = fopen ("php://stdin","r");
              	$dataparam    = fgets($parameter);
              	if (trim($dataparam) !='') {

              		//explode parameter
              		$commandLineArgument  = explode(' ' , $dataparam);
              		if (count($commandLineArgument) == 8 ) {

              			$UrlPostHttpd   = 'http://url/HttpPostRetrive.php?get=senddata';
              			$nik			= $commandLineArgument[0];
              			$nama			= $commandLineArgument[1];
              			$pin			= $commandLineArgument[2];
              			$cabang			= $commandLineArgument[3];
              			$ipaddress		= $commandLineArgument[4];
              			$typepabx		= $commandLineArgument[5];
              			$status			= $commandLineArgument[6];
              			$cost			= $commandLineArgument[7];


              			$fields = array(
              				'nik'	 => $nik,
              				'nama'	 => $nama,
              				'pin'	 => $pin,
              				'cabang' => $cabang,
              				'ip'	 => $ipaddress,
              				'type' 	 => $typepabx,
              				'status' => $status,
              				'cost'	 => $cost,
              			);
              			$fields_string ='';
              			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
              			rtrim($fields_string, '&');

              			//set the url, number of POST vars, POST data
              			echo " \n";
              			echo " \n";
              			echo "=============================================================================\n";
              			echo "Resume Post : \n";
              			echo "URl : $UrlPostHttpd \n";
              			echo "data: $dataparam \n";
              			echo "Result: \n";
              			$ch = curl_init();
              				  curl_setopt($ch,CURLOPT_URL, $UrlPostHttpd);
              				  curl_setopt($ch,CURLOPT_POST, count($fields));
              				  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

              			$result = curl_exec($ch);
              			print_r($result);
              			curl_close($ch);


              		} else {
              			echo  " Maaf Argument yang anda masukan kurang \n";
              			exit;
              		}

              	}else {

              		echo "Anda Belum Memasukan Argument\n";
              		exit;

              	}
              } else  {

              	echo "Keluar dari System        \n";
              	exit;

              }

}



function cek_status(){


  echo "\n=============================================================================\n";
  echo "                             WELCOM TO HTTP POST SENDER  \n";
  echo " \n";
  echo "masukan parameter transactionid \n";
  echo " \n";
  echo "=============================================================================\n";
  $handle         = fopen ("php://stdin","r");
  $line	          = fgets($handle);
  $UrlPostHttpd   = 'http://URL/HttpPostRetrive.php?get=cekstatus';

  echo "Resume Post : \n";
  echo "URl : $UrlPostHttpd \n";
  echo "data: $line \n";
  echo " \n";
  echo " \n";
  echo "=============================================================================\n";
  echo "Result: \n";

  $fields = array ('id' => $line);
  $fields_string = 'id='.$line;

  $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL, $UrlPostHttpd);
      curl_setopt($ch,CURLOPT_POST, count($fields));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

  $result = curl_exec($ch);
}
?>
