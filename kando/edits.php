 <?php
  		
        $id= $_POST['id'];
        $host = 'localhost';
        $username = 'root';
        $pass = '';
        $dbname = 'kando';
        $conn = mysqli_connect($host,$username,$pass,$dbname);
        $sql = "select * from kando where EmployeeId= '$id'";
        $res = mysqli_query($conn,$sql);
        
    ?>
 <!DOCTYPE html>
 <html>
 <head>
  	
</head>
 <body>
    
        
     <form action="updates.php?id=<?=$id;?>" method="POST">
        <?php while ($row = mysqli_fetch_array($res)) {?>
    	แก้ชื่อเรื่อง : <input type="text" autocomplete="off" id="NameNews" name="NameNews" placeholder="ชื่อเรื่อง" value=<?php echo $row['NameNews'];?>> <br>
   		แก้รายละเอียด : <input  id='Detail' placeholder="รายละเอียด" name='Detail'  autocomplete="off" value=<?php echo $row['Detail'];?>> <br>
        สถานะ :
        <?php 
        if($row['Status']==1)
          {
                                
                                echo "<input type='checkbox' checked data-toggle='toggle' id='Status' name='Status' data-offstyle='secondary' data-onstyle='success'>";
                                
            } 
            if($row['Status']==0) 
                              {
                                
                               echo "<input type='checkbox' data-toggle='toggle' id='Status' name='Status' data-onstyle='success' data-offstyle='secondary'>";

                            } 
        ?>
        <br>
        
        <input type="submit" value='แก้ไข'>
    	</form>
    <?php } ?>
 </body>
 </html>

        