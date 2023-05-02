 <?php
        $EmployeeId = $_SERVER['QUERY_STRING'];
        //GetFromUrl

        // $host = 'localhost';
        // $username = 'root';
        // $pass = '';
        // $dbname = 'kando';
        // $conn = mysqli_connect($host,$username,$pass,$dbname);
        // $sql = "select * from kando where ID_NO='$id' ";
        // $res = mysqli_query($conn,$sql);
        
        // while($row = mysqli_fetch_assoc($res))
        // {
        //   echo '<p>'.'ชื่อเรื่อง :'.$a = $row['NameNews'].'</p>';
        //   echo '<p>'.'เนื้อหา :'.$b = $row['Details'].'</p>';
        //   echo '<p>'.'สถานะ:'.$c = $row['Status'].'</p>';

        // }

        // mysqli_query($conn,$sql);
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://dev-sw6-uapi.ecm.in.th/uapi/drt-ElectronicsDocument/ED-GetNews?EmployeeId='.$EmployeeId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
$EmployeeId;
curl_close($ch);


?>
        