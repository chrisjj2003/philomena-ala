<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Philomena</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="stylesheet" href="styles/style.css">

  <script src="https://kit.fontawesome.com/d093a95138.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $( function() {

        $( "#datepicker" ).datepicker({ minDate: 1, maxDate: "+1M +10D" ,
         inline: true,
          altField: '#seldate'
          });
        var currentDate = $( ".selector" ).datepicker( "getDate" );
      } );
  </script>

 

</head>

<body>
  <div class="header is-white">
      <div class="icon-container">
          <div class="icon">
            
          </div>
      </div>
  
  <?php 
    if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] == "ACTIEF"){
        if($_SESSION["ROL"] == 0){
  ?>
 
  <ul class="nav flexbox align-right">
       <li></li> <img id="header_logo" src="../assets/assets/philomena.png"></li>
        <li ><a class="is-button" href="index.php?page=dashboard">Dashboard</a></li>
        <li ><a class="is-button" href="index.php?page=profiel">Profiel</a></li>          
        <li ><a class="is-button" href="index.php?page=geschiedenis">Geschiedenis</a></li>          
        <li ><a class="is-button" href="index.php?page=uitloggen">Uitloggen</a></li>
        <li ><a class="username is-button is-uppercase" href="#"> <?php echo $_SESSION["USER_NAME"]; ?> </a>
                <i class="far fa-user avatar"></i>
        </li>
  </ul>

<?php


    }else if($_SESSION["ROL"] == 1){
?>
<div class="user">
        <p id="user">Medewerker:
        <?php echo $_SESSION["USER_NAME"]; ?></p>
  
    </div>
    <ul class="nav flexbox align-right">
      <img id="header_logo" src="../assets/assets/philomena.png">
      <li ><a class="is-button" href="index.php?page=medewerker">Dashboard</a></li>
      <li ><a class="is-button" href="index.php?page=uitloggen">Uitloggen</a></li>
      <li ><a class="username is-button is-uppercase" href="#"> <?php echo $_SESSION["USER_NAME"]; ?> </a>
              <i class="far fa-user avatar"></i>
      </li>
</ul>
  </div>


    <?php   }
        } 
        ?>


      </div>


</body>
</html>