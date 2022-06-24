
<?php 
  
  
    if(isset($_POST["nagels"])){
      $_SESSION["type"] = "nagels";
      echo "<script>location.href='index.php?page=nagels';</script>";
    }

    if(isset($_POST["knippen"])){
      echo "<script>location.href='index.php?page=knippen';</script>";
    }

  
    $sql = "SELECT `afspraak`.`id`, `behandeling`.`naam` AS `behandeling`, `tijd` ,`datum` , `voornaam` ,`status`,`achternaam` 
            FROM `afspraak` INNER JOIN `klant` 
            ON `afspraak`.`klantID` = `klant`.`ID` 
            INNER JOIN `behandeling` 
            ON `afspraak`.`behandelingID` = `behandeling`.`id`
            WHERE `afspraak`.`klantID` = :klantid ORDER BY `datum`, `tijd` DESC";

    $stmt = $pdo->prepare($sql);
 
    $stmt->execute(array("klantid"=> $_SESSION["USER_ID"]));
    $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="page m-10 text-is-white">
    
      <p id="user">Welkom
      <?php echo ucfirst($_SESSION["USER_NAME"]); ?> </p>
  </br>
      <div>
      <a href="index.php?page=afspraken" class="afspraak-button"> nieuwe afspraak</a>
      </div>
</div>


<div class="flexbox is-column">

<div class="">
  <h1> Afspraken</h1>
</div>

<div class="wrapper flexbox align-left flex-wrap text-is-dark">
<p id="cancel">
<?php  function checkStatus($status){

if($status == 0){
  return "open";
}
}?>   
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
            <?php echo $value["behandeling"] ; ?>
            </p> 
            <br>
           
            <p>
            <?php 
if ($value["status"] ==0){
    ?>
    <p class="is-bold"> Staat: Open </p><br>
            <a href="paginas/annuleer.php?id=<?php  echo $value["id"]?>">Annuleren</a>
          
            </p>
<?php } ?>
        </div>
        <?php ;
         endforeach ;
     
 
?>
 </div>
</div>