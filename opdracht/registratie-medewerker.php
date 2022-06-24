<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Philomena</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  
  <link rel="stylesheet" href="styles/style.css">
  
</head>

<body>
    <?php
        include_once("DBconfig.php");
     
        if(isset($_POST["submit"])){

            $voornaam = $_POST["voornaam"];
            $achternaam = $_POST["achternaam"];
            $email = $_POST["email"];
            $functie = $_POST["functie"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    

            $sql = "INSERT INTO `medewerker` (`ID`, `voornaam`, `achternaam`, `email`, functie, `wachtwoord`) 
                        VALUES (NULL, :voornaam, :achternaam,  :email, :functie,  :password)";

            $stmt = $pdo->prepare($sql);
            $userArray = array( "voornaam"=>$voornaam, 
                                "achternaam"=>$achternaam,
                                "email"=>$email, 
                                "functie"=>$functie,
                                "password"=>$password,
                                );                            
            $stmt->execute($userArray);
          

            echo "<script>location.href='index.php?page=inloggen';</script>";

    }
    
    ?>
   <div class="content text-is-dark">
    <div class="container is-white glow">
        <form name="inloggen" method="POST" enctype="multipart/form-data" action="">
            <h1>Mederwerkers Registreren</h1>
            <input required type="text" class="is-input" name="voornaam" placeholder="voornaam">
            <input required type="text"  class="is-input" name="achternaam" placeholder="achternaam">
            <input required type="email"  class="is-input"  name="email" placeholder="myname@mail.com">
            <input required type="text"  class="is-input" name="functie" placeholder="functie">
            <input required type="password"  class="is-input" name="password" placeholder="wachtwoord">
            <input type="submit" class="submit" name="submit" value="registreer">
            <div class="flexbox">

            <a href="index.php">inloggen</a>
           
        </form>
      
    </div>
    </div>
    
</body>
</html>