 <!DOCTYPE html>
 <html>
 <head>
   <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>
 </head>
 <body>
       <?php
        
        $id = $_GET['id'];
        
        $host = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'kando';
        $conn = mysqli_connect($host,$username,$pass,$dbname);
        $sql = "select * from kando where EmployeeId='$id' ";
        $res = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($res))
        {
          echo '<p>'.'ชื่อเรื่อง'.'<span style=color:red>'.'*'.'</span>   '.$a = $row['NameNews'].'</p>';
          echo '<p>'.'เนื้อหา'.'<span style=color:red>'.'*'.'</span>    '.$b = $row['Detail'].'</p>';
          if($row['Status']==1)
          {
                                echo "สถานะ : ";
                                echo "<input type='checkbox' checked data-toggle='toggle' id='Status' name='Status' data-offstyle='secondary' data-onstyle='success' disabled>";
                                
            } 
            if($row['Status']==0) 
                              {
                                echo "สถานะ : ";
                               echo "<input type='checkbox' data-toggle='toggle' id='Status2' name='Status2' data-onstyle='success' data-offstyle='secondary' disabled>";

                            } 
        }
      
        mysqli_query($conn,$sql);

?>
 </body>
 </html>

        