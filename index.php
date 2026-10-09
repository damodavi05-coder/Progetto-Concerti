<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css.css">
    <style>
        table{
            width: 100%;
            height: 100%;
        }
        tr{
            width: 100%;
            height: 100px;
        }
        td{
            width: 20%;
            height:100px;
            padding: 0px;
        }
        #login{
            width: 500px;
            padding-bottom:70px;
            border-radius:20px;
            background-image:linear-gradient(to bottom right,#7D4D97, pink); 
            border: solid 5px #4C5C68;
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
                    <div id="login"><br><br><h1 style="color:#46494C">Login</h1><br>
                        Inserisci l'email: <input type="email" name="email" class="in"><br><br>
                        Inserisci la password: <input type="password" name="password" class="in"><br><br>
                        <input type="submit" class="invio"><br><br>
                        Non hai un account? <a href="registra.php?email=&user=">Registrati</a>
                    </div>
                </center>
            </form>
            </div>
    <div id="foot">

    </div>
    <?php
    if (isset($_POST['password'])&&isset($_POST['email'])) {
        $con = new mysqli("localhost","root","","capolavoro");
        if (mysqli_connect_errno()) {
            echo("<br>Connessione non effettuata: ".mysqli_connect_error()."<BR>");
            exit();
        }
        $sql = "SELECT * FROM utenti";
        $ris = $con->query($sql) or die ("Query fallita!");
        $password=$_POST['password'];
        $email=$_POST['email'];
        $user="";
        $esiste=false;
        foreach($ris as $riga) 
        {
            $emaildb=$riga["email"];
            $passworddb=$riga["PASSWORD"];
            if (strcasecmp($emaildb, $email)==0&&strcmp($password, $passworddb)==0) {
                $esiste=true;
                $user=$riga["user"];
            }
        }
        $con->close();
        if($esiste==true){
            header("Refresh:0; url=sito.php?user=".$user."&ordine=ORDER BY cantante;");
        }else{
            header("Refresh:0;");
        }
    }
?>
</body>
</html>