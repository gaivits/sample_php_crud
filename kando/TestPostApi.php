<?php
  
  $EmployeeId = $_POST['EmployeeId'];
  $NameNews = $_POST['NameNews'];
  $Detail = $_POST['Detail'];
  $Status  = $_POST['Status'];
  if($Status)
  {
    $Status=1;
  }
  else
  {
    $Status=0;
    
  }
  $UpdatedDate = $_POST['UpdatedDate'];
  $ButtonView = $_POST['ButtonView'];
  $ButtonEdit = $_POST['ButtonEdit'];
  $ButtonDelete = $_POST['ButtonDelete'];
$ch = curl_init();
$postf = [
  "EmployeeId"=>$EmployeeId,"NameNews"=>$NameNews,"Detail"=>$Detail,"Status"=> $Status,"UpdatedDate"=>$UpdatedDate,"ButtonView"=>$ButtonView,"ButtonEdit"=>$ButtonEdit,"ButtonDelete"=>$ButtonDelete
];
$pf = json_encode($postf,true);
curl_setopt($ch, CURLOPT_URL, 'http://dev-sw6-uapi.ecm.in.th/uapi/drt-ElectronicsDocument/ED-UpdateStatusNews');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '$pf');


$headers = ['Content-Type'=> 'multipart/form-data'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

    
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'kando';
    $conn = mysqli_connect($host,$username,$pass,$dbname);
    $sql = "INSERT INTO kando (EmployeeId,NameNews,Detail,Status,UpdatedDate,ButtonView,ButtonEdit,ButtonDelete) VALUES ('$EmployeeId','$NameNews','$Detail','$Status','$UpdatedDate','$ButtonView','$ButtonEdit','$ButtonDelete')";
    mysqli_query($conn,$sql);
curl_close($ch);

?>