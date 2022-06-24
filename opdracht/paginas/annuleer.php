<?php
include_once("../DBconfig.php");
$id=$_GET['id'];
$sql = "DELETE FROM afspraak WHERE id=:id";
        $stmt = $pdo->prepare($sql);
       $stmt_exec= $stmt->execute(array(":id"=>$id));
        if ($stmt_exec) {
            echo '<script>alert("Succesvol geannuleerd")</script>';
        }
        else {
          echo "fail";
        }
 header("refresh:1 ../index.php?page=dashboard");

?> 

  