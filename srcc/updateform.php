<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update patient </title>
  </head>
  <body>

<?php
require '../connect.php';

// $sql_select = 'select * from country order by CountryCode';
// $stmt_s = $conn->prepare($sql_select);
// $stmt_s->execute();
// echo "CustomerID = ".$_GET['CustomerID'];

if (isset($_GET['qdate'], $_GET['qnumber'])) {
    $sql_select_customer = 'SELECT * FROM tbl_queue WHERE qdate=? AND qnumber=?';
    $stmt = $conn->prepare($sql_select_customer);
$params = array($_GET['qdate'],$_GET['qnumber']);
$stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);echo "jjjj".$_GET['qdate'];
}
?>

    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลการจองคิว</h3>
          <form action="update.php" method="POST">
           <input type="hidden" name="qdate" value="<?= $result['qdate'];?>">
            
                <label for="name" class="col-sm-5 col-form-label"> วันที่จองเข้ารับการรักษา:  </label>
              
                <input type="date" name="qdate" class="form-control" required value="<?= $result['qdate'];?>">           
           
            
                <label for="name" class="col-sm-5 col-form-label"> หมายเลขคิว :  </label>
             
                <input type="text" name="qnumber" class="form-control" required value="<?= $result['qnumber'];?>">

                 <label for="name" class="col-sm-6 col-form-label"> เลขบัตรประชาชน :  </label>
             
                <input type="text" name="pid" class="form-control" required value="<?= $result['pid'];?>">
<br>
                 <label>สถานะคิว </label>
                     <br>

<select name="qstatus" id="qstatus">
  <option value="รอการรักษา">รอการรักษา</option>
  <option value="เข้ารับการรักษาแล้ว">รักษาเสร็จแล้ว</option>
 
</select> 
<br>
          
            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>