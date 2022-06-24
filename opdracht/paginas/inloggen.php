

<div class="content text-is-dark">
  <img id="logo" src="../assets/assets/philomena-logo-diap.png">
    <div class="container is-white glow">
        <form name="inloggen" action="" method="POST" enctype="multipart/form-data" action="">
            <h1>Klant Inloggen</h1>
            <input class="is-input m-10" required type="email" name="e-mail" placeholder="myname@mail.com">
            <input class="is-input m-10" required type="password" name="password" placeholder="wachtwoord">
            <input type="submit" class="submit" name="submit" value="inloggen">
           
        </form>
        <div class="flexbox is-column">
            <div class="flexbox">
                <a class="m-10" href="registreren.php">registreren</a>
                <br>
             
            </div>
            <a class="m-10" href="registratie-medewerker.php">medewerker registratie</a>
            <a class="m-10" href="index.php?page=login-medewerker">medewerker portaal</a>
            
        </div>
    </div>
</div>
    
    
    <?php 
        $email = "";
        if(isset($_POST["submit"])){
            $melding = "";
            $email = htmlspecialchars($_POST["e-mail"]);
            $password = htmlspecialchars($_POST["password"]);
        }
        
 
        try{

            $sql = "SELECT * FROM `klant` WHERE `email` = :email ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(":email"=>$email));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                $passwordDB = $result["wachtwoord"];
                
               
                if(password_verify($password,  $passwordDB)){
                    
                    $_SESSION["ID"] = session_id();
                    $_SESSION["USER_ID"] = $result["ID"];
                    $_SESSION["USER_NAME"] = $result["voornaam"];
                    $_SESSION["EMAIL"] = $result["email"];
                    $_SESSION["STATUS"] = "ACTIEF";
                    $_SESSION["ROL"] = 0;
                    echo "<script>location.href='index.php?page=dashboard';</script>";
                    

  
                }
            }
            
        }catch(PDOException $e){
            echo $e-getMessage();
        }
    
    ?>