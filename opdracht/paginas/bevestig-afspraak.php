<?php
    $type              = $_SESSION["type"];
    $behandeling       = $_SESSION["behandeling"] ;        
    $behandelingID     = $_SESSION["behandelingID"] ;        
    $tijd              = $_SESSION["tijd"] ;
    $datum             = $_SESSION["datum"] ;
    $klantID           = $_SESSION["USER_ID"] ;
    $mijndatum= strftime($_SESSION["datum"]);
   

    
    if(isset($_POST["bevestigen"])){
       
        $sql = "INSERT INTO `afspraak` (`id`, `tijd`, `datum`, `status`, `klantID`, `medID`, `behandelingID`) 
                    VALUES (NULL, :time, :date, '0', :klantID, '1', :behandeling);";
        
        $date_str = explode("/",$datum );
        $date = new DateTime();
        $date->setDate($date_str[2], $date_str[0], $date_str[1]);
        
        $appointment = array(   "time"=>$_SESSION["tijd"] . "00",
                                "date"=>$date->format('Y-m-d H:i:s'),
                                "klantID"=>$klantID,
                                "behandeling"=>$behandelingID
                             );

        $stmt = $pdo->prepare($sql);
        $stmt->execute($appointment); 
         $sql = "SELECT `prijs` FROM `behandeling` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id"=>$behandelingID));
    $price = $stmt->fetchColumn(); ?>
        <form class="flexbox"  method="POST"  action="index.php?page=payment">
           
<input type="hidden" class="hidden" name="price" value= "<?php echo ($price) ?>" />
<input type="submit" class="submit m-10 next" name="bevestigen" value="betaal">
      <?php 
   ?>
      </form>  
      <?php
    }

    if(isset($_POST["goback"])){
        echo "<script>location.href='index.php?page=tijd';</script>";
    }

    
    $sql = "SELECT `prijs` FROM `behandeling` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id"=>$behandelingID));
    $price = $stmt->fetchColumn();
 
  ?>



<div class="content text-is-dark">
    <div class="container is-white glow">

    <p class="is-bold"> Stap 5/5 </p>
            </br>
           
                <h2> <?php echo ucfirst($_SESSION["type"]) ?></h2>
                
                <p> Jouw afspraak <span class="is-bold"><?php echo $_SESSION["behandeling"]; ?> </span></p>
                <p>  is op <span class="is-bold"><?php setlocale(LC_ALL, 'nl_NL'); setlocale(LC_TIME, 'NL_nl'); 
                
                echo strftime('%A %e %B %Y'); ?></span> Om <span class="is-bold"> <?php echo $tijd ; ?> </span>uur</p>

                <div class="flexbox align-right m-10"> 
                    <h1> Prijs €<?php echo $price;?></h1> 
                  <?php  $pay= $price; ?>
                  <?php   ?>
                </div>
            
                <form class="flexbox"  method="POST"  >
           
<input type="hidden" class="hidden" name="price" value= "<?php echo ($pay) ?>" />
                <input type="submit" class="submit m-10" name="goback" value="Terug" />
            
            <input type="submit" class="submit m-10 next" name="bevestigen" value="bevestigen">
            </form>
         
           
    </div>
</div>