<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css.css">
    <style>
        
        table{
            width: 100%;
            border-collapse:collapse;
            table-layout:fixed;
            border-spacing:0px;
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
            padding-bottom: 0.9px;
        }
        .concerti{
            width: 40%;
            border:solid 1px;
            border-radius:50px;
            height: 200px;
            background-color:lightgray;

        }
        .cantanti{
            height:200px;
        }
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body style="margin: 0;">
    <div id="barra">
        <table>
            <tr>
                <td class="colore"><center><a href="index.php">Logout</a></center></td>
                <td class="colore"><center></center></td>
                <td class="colore"><center><img src="logo.png" alt="logo" width="75px"></center></td>
                <td class="colore"><center><br><form action="" method="get"><input type="radio" style="display:none" checked name="user" value=<?php echo $_GET['user'] ?>>Ordina per: <select name="ordine" id="ordine" style="border-radius:10px;padding-left:10px; padding-right:10px;"><option value="ORDER BY cantante;">Nome A-Z</option><option value="ORDER BY cantante DESC;">Nome Z-A</option></select><br><br><input type="submit" value="Ordina" class="invio"></form></center></td>
                <td class="colore"><center>Benvenuto <?php $user=$_GET['user']; echo $_GET['user']."<br><a href='profilo.php?user=".$_GET['user']."'>Vai al profilo</a>";?></center></td>
            </tr>
        </table><br><br>
        <center>
            <?php
                $con = new mysqli("localhost","root","","capolavoro");
                if (mysqli_connect_errno()) {
                    echo("<br>Connessione non effettuata: ".mysqli_connect_error()."<BR>");
                    exit();
                }
                $sql = "SELECT * FROM concerti ".$_GET['ordine'];
                $ris = $con->query($sql) or die ("Query fallita!");
                foreach($ris as $riga) 
                {
                    $cantante=$riga["cantante"];
                    $idconcerto=$riga["id_concerto"];
                    echo('<div class="concerti"><table class="cantanti"><tr><td rowspan="2"><img alt="Foto non disponibile" src="'.$cantante.'.jpg" width="200px" height="200%" style="border-top-left-radius:50px;border-bottom-left-radius:50px"></td><td> Cantante:<br>'.$cantante.'</td></tr><tr><td><a href="concerto.php?cantante='.$cantante.'&user='.$user.'">Vai al concerto</a></td></tr></table></div><br>');
                }
                $con->close();

            ?>
            
        </center>
    <br><br>

    </div>
</body>
</html>