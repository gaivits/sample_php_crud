<?php
    include "TestGetApi.php";
    $Eid = $EmployeeId;
     $host = 'localhost';
     $username = 'root';
     $pass = '';
     $dbname = 'kando';
     $conn = mysqli_connect($host,$username,$pass,$dbname);
     
      $limit = 4;  
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
    } 
    else{ 
    $page=1;
    };  
$start_from = ($page-1) * $limit;  
    $sql = "select * from kando LIMIT $start_from,$limit";
     $res = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
<style>
    
    .table-sortable tbody tr {
    cursor: move;
}

</style>

<body>

    <h1>ข่าวประชาสัมพันธ์</h1>
    <br><br><br>
    <h2 style="margin-left:30%;">รายการข่าวประชาสัมพันธ์</h2>
    <button style="margin-left: 70%;" id="add_row" data-toggle="modal" class='btn btn-success' data-target="#myModal">เพิ่มรายชื่อ</button>
    <br> 
          
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">เพิ่มข่าว</h4>
        </div>
        <div class="modal-body">
          <form action="create_news.php" method='POST'>
            
            <input type="checkbox" data-toggle="toggle" id='Status' name='Status' data-onstyle="success" data-offstyle="secondary"> <br> <br>
            <input type = 'text' id='NameNews' placeholder="ชื่อหัวเรื่อง" required name='NameNews' autocomplete="off"> <br>
            <textarea  id='Detail' placeholder="รายละเอียด" required name='Detail' rows="3" cols="20" autocomplete="off"></textarea>  <br>
            
            <input type="text" id='UpdatedDate' name='UpdatedDate' width=200> <br>
            ButtonView : <input type = 'number' min=0 max=1 step=0 id='ButtonView' name='ButtonView' width="150px" autocomplete="off"> <br>
            ButtonEdit :<input type = 'number' min=0 max=1 step=0 id='ButtonEdit'  name='ButtonEdit' width="150px" autocomplete="off"> <br>
            ButtonDelete :<input type = 'number' min=0 max=1 step=0 id='ButtonDelete'  name='ButtonDelete' width="150px" autocomplete="off"> <br>
            

        </div>
            <div class="modal-footer">
            <input type="submit" class="btn btn-success">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 table-responsive">
            
            <br>
            
            <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                <thead>
                    <tr >
                        <th class="text-center">
                            status
                        </th>
                        <th class="text-center">
                            No
                        </th>
                        <th class="text-center">
                            ชื่อเรื่อง
                        </th>
                        <th class="text-center">
                            วันที่สร้าง
                        </th>
                        <th class="text-center" colspan="3">
                            Action
                        </th>
                        <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($res))
                        {
                        ?>
                        <tr id=<?php $row["NewsId"];?>>
                        <td data-name="Status">
                            <center>
                            <?php if($row['Status']==1) {?>

                                <input type="checkbox" checked data-toggle="toggle" id='Status' name='Status' data-offstyle="secondary" data-onstyle="success" disabled>
                                
                            <?php } if($row['Status']==0) { ?>
                                <input type="checkbox" data-toggle="toggle" id='Status' name='Status' data-onstyle="success" data-offstyle="secondary" disabled>

                            <?php } ?>

                            </center>
                        </td>
                        <td data-name="No">
                            <?php echo $row['NewsId']; ?>
                        </td>
                        <td data-name="NameNews">
                            <?php echo $row['NameNews']; ?>
                        </td>
                        
                        <td data-name="dates">
                            <?php echo $row['UpdatedDate']; ?>
                        </td>
                        
                        
                        <td data-name="del">
                            <?php if($row['ButtonView']==1) {?>

                                <button onclick= 'getByID(<?php echo $Eid ;?>)' data-target='#myModal2' data-toggle='modal'  name="del0" class='btn btn-primary glyphicon glyphicon-remove row-remove'><span aria-hidden="true"></span><i class="far fa-file-alt"></i></button>
                                
                            <?php } if($row['ButtonView']==0) { ?>
                                

                            <?php } ?>

                            <?php if($row['ButtonEdit']==1) {?>

                                <button onclick='edits(<?php echo $row['EmployeeId'] ;?>)' name="del0" data-target='#myModal3' data-toggle='modal' class='btn btn-info glyphicon glyphicon-remove row-remove'><span aria-hidden="true"><i class="far fa-edit"></i></span></button>
                                
                            <?php } if($row['ButtonEdit']==0) { ?>
                                

                            <?php } ?>
                            
                            <?php if($row['ButtonDelete']==1) {?>

                                <button  onclick= 'dels(<?php echo $row['NewsId'] ;?>)' name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true"><i class="fas fa-trash"></i></span></button>
                                
                            <?php } if($row['ButtonEdit']==0) { ?>
                                

                            <?php } ?>
                            </td>

                    </tr>
                    
                </tbody>
                <?php }?>
                
                
            

                
            </table>
            <?php  

$result_db = mysqli_query($conn,"SELECT COUNT(*)  FROM kando"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";   
}
echo $pagLink . "</ul>";  
?>
          
    
    <div id='viewP'>
        <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">รายการข่าวประชาสัมพันธ์</h4>
        </div>
        <div class="modal-body">

            
            
            </div>
            <div class="modal-footer">
            
          <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
        </div>
        
      </div>
      
    </div>
  </div>
    </div>

    <div id='editP'>
        <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">แก้ไขข่าวประชาสัมพันธ์</h4>
        </div>
        <div class="modal-body2" id='modal-body2'>

            
            </div>
            <div class="modal-footer">
            
          <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
        </div>
        
      </div>
      
    </div>
  </div>
    </div>


</body>

</html>
<script>


$('#UpdatedDate').datetimepicker({
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true,
            format : 'dd/mm/yyyy H:mm',
        });

function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'index.php?page='+page;   
    }   

function getByID(id)
{
    $.ajax({
        type:'GET',
        data : {'id':'3'},
        url : 'showById.php',
        
        success:(res)=>{
           $('.modal-body').html(res)

        }
    })
    
}

function edits(id)
{
    $.ajax({
        type:'POST',
        data : {'id':id},
        url : 'edits.php',
        
        success:(res)=>{
           $('.modal-body2').html(res)

        }
    })
    
}
function dels(id)
{
    if(confirm('คุณต้องการลบหรือไม่?') )
    {
        $.ajax({
            type:"GET",
            data : {"id":id},
            url : "del_news.php",
            success:function(res){
                    $("#delete"+id).hide()
                    window.location.href = "index.php"        
                }
            })
    }
    
}



</script>