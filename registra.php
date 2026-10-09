<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css.css">
    <style>
        table, tr{
            width: 100%;
            height: 100%;
        }
        td{
            width: 20%;
        }
        #login{
            width: 500px;
            padding-bottom:70px;
            border-radius:20px;
            background-image:linear-gradient(to bottom right,#7D4D97, pink); 
            border: solid 5px #4C5C68;
        }
        .invio:hover{
            background-color:gray;
            color:white;
        }
        .invio{
            transition-timing-function: ease;
            transition: all 1s;
            border-radius:10px;padding-left:10px; padding-right:10px;
        }
        


    </style>
</head>
<body style="margin: 0;">
    <div id="barra">
        <table>
            <tr>
                <td class="colore"><center></center></td>
                <td class="colore"><center></center></td>
                <td class="colore"><center><img src="logo.png" alt="logo" width="75px"></center></td>
                <td class="colore"><center></center></td>
                <td class="colore"><center></center></td>
            </tr>
        </table>
    </div><div id="corpo"><br><br><br>
        
            <form action="" method="post">
                <center>
                    <div id="login"><br><br><h1 style="color:#46494C">Registrati</h1><br>
                        Inserisci l'user: <input type="text" name="user" class="in"><br><br>
                        Inserisci l'email: <input type="email" name="email" class="in"><br><br>
                        Inserisci la password: <input type="password" name="password" class="in"><br><br>
                        <input type="submit" class="invio"><br><br>
                        Hai un account? <a href="index.php">Accedi</a><br>
                        <?php if($_GET['email']==""){ }else{
                            echo "L'email ".$_GET['email']." e' gia' usata<br>";
                        }
                        if($_GET['user']==""){ }else{
                            echo "L'user ".$_GET['user']." e' gia' usato";
                        }
                        
                        ?>
                    </div>
                </center>
            </form>
            </div>
    <div id="foot">

    </div>
    <?php
    if (isset($_POST['password'])&&isset($_POST['email'])&&isset($_POST['user'])) {
        $con = new mysqli("localhost","root","","capolavoro");
        if (mysqli_connect_errno()) {
            echo("<br>Connessione non effettuata: ".mysqli_connect_error()."<BR>");
            exit();
        }
        $sql = "SELECT * FROM utenti";
        $ris = $con->query($sql) or die ("Query fallita!");
        $password=$_POST['password'];
        $email=$_POST['email'];
        $user=$_POST['user'];
        $esiste=false;
        foreach($ris as $riga) 
        {
            $emaildb=$riga["email"];
            $userdb=$riga["user"];
            if (strcasecmp($emaildb, $email)==0||strcasecmp($userdb, $user)==0) {
                $esiste=true;
            }
        }
        if($esiste==true){
            header("Refresh:0; url=registra.php?email=".$email."&user=".$user);
            $con->close();
        }else{
            $sql = "INSERT INTO utenti(email,user,PASSWORD)";
            $sql.=" VALUES('".$_POST['email']."','".$_POST['user']."','".$_POST['password']."');";
            $ris = $con->query($sql) or die ("Query fallita!");
            header("Refresh:0; url=sito.php?user=".$user."&ordine=ORDER BY cantante;");
            $con->close();
        }
    }
?>
</body>
</html>