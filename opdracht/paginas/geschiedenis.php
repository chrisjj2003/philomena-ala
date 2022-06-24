<?php
$sql = "SELECT `afspraak`.`id`, `behandeling`.`naam`
AS `behandeling`, `tijd` ,`datum` , `medewerker`.`voornaam` , `medewerker`.`achternaam`
FROM `afspraak` INNER JOIN `klant` 
ON `afspraak`.`klantID` = `klant`.`ID` 
INNER JOIN `behandeling` 
ON `afspraak`.`behandelingID` = `behandeling`.`id`
INNER JOIN `medewerker` 
ON `afspraak`.`medID` = `medewerker`.`id`
WHERE `afspraak`.`klantID` = :klantid AND `afspraak`.`status`!=0 ORDER BY `datum`, `tijd` DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute(array("klantid"=> $_SESSION["USER_ID"]));
$klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<div class="page  text-is-white">
    <h1>Afspraak geschiedenis</h1>
     
  </br><br><br><br>
     
</div>


<div class="flexbox is-column">

<div class="">
  <h1>huldige afspraken</h1>
</div>

<div class="wrapper flexbox align-left flex-wrap text-is-dark">
<p id="cancel">
            
    <?php 
    
    foreach($klanten as $value): 
      $mydate = strtotime($value["datum"]);
      ;?>
        <div class="container  m-10  is-white glow">
        
    
        <p class="is-bold"> </p>
        <h2>

        <?php 
        setlocale(LC_ALL, 'nl_NL');
        setlocale(LC_TIME, 'NL_nl');
        echo strftime('%A %e %B %Y',$mydate)." • ". $value["tijd"];  ?>
             </h2>
            
             <p>
            <?php echo $value["behandeling"]."<br>" ?>
            </p> <br>
            <p class="is-bold">
          <?php echo "Door: ".$value["voornaam"]." ".$value["achternaam"]; ?>
            
            </p>
            
          
    

        </div>
        
        <?php endforeach ?><br>
     

        </div>
</div>