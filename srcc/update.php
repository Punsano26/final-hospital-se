<?php

if (isset($_POST['qdate'])) {
    require '../connect.php';

    $qdate = $_POST['qdate'];
    $qnumber = $_POST['qnumber'];
    $qstatus =  $_POST['qstatus'];

    echo 'qdate = ' . $qdate;
    echo 'qnumber = ' . $qnumber;
    echo 'qstatus = ' . $qstatus;
    
    

    // $stmt = $conn->prepare("UPDATE  Customer SET Name=:Name, Email=:Email WHERE CustomerID=:CustomerID");
    $stmt = $conn->prepare(
        'UPDATE tbl_queue SET qstatus=:qstatus WHERE qdate=:qdate AND qnumber=:qnumber'
    );
    $stmt->bindParam(':qdate', $qdate);
    $stmt->bindParam(':qnumber', $qnumber);
        $stmt->bindParam(':qstatus', $qstatus);

   
   
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>