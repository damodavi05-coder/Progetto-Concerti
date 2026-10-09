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
            width: 50%;
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
                <td class="colore"><center><?php $user=$_GET['user']; echo "<a href='sito.php?user=".$_GET['user']."&ordine=ORDER BY cantante;'>Torna alla home</a>";?></center></td>
                <td class="colore"><center><img src="logo.png" alt="logo" width="75px"></center></td>
                <td class="colore"><center><br></center></td>
                <td class="colore"><center>Benvenuto <?php $user=$_GET['user']; echo $user;?></center></td>
            </tr>
        </table><br><br>
        <center>
            <h1>Hai comprato:</h1>
            <?php
                $con = new mysqli("localhost","root","","capolavoro");
                if (mysqli_connect_errno()) {
                    echo("<br>Connessione non effettuata: ".mysqli_connect_error()."<BR>");
                    exit();
                }
                $sql = "SELECT * FROM biglietti ";
                $ris = $con->query($sql) or die ("Query fallita!");
                foreach($ris as $riga) 
                {
                    if (strcasecmp($riga["user"], $_GET['user'])==0) {
                        $idconcerto=$riga["id_concertopercantante"];
                        $sql2 = "SELECT * FROM concertipercantante";
                        $ris2 = $con->query($sql2) or die ("Query fallita!");
                        foreach($ris2 as $riga2){
                            if(strcasecmp($riga2["id_concertopercantante"], $idconcerto)==0){
                                $cantante=$riga2["cantante"];
                                $data=$riga2["data"];
                                $luogo=$riga2["luogo"];
                                $orainizio=$riga2["orainizio"];
                                $prezzo=$riga2["prezzo"];
                            }
                        } 
                        echo('<div class="concerti"><table class="cantanti"><tr><td rowspan="2"><img alt="Foto non disponibile" src="'.$cantante.'.jpg" width="200px" height="200%" style="border-top-left-radius:50px;border-bottom-left-radius:50px"></td><td>Biglietto:<br> Cantante:'.$cantante.'<br>Data:'.$data.'<br>Luogo: '.$luogo.'<br>Ora inizio: '.$orainizio.'<br>Prezzo: '.$prezzo.'<br><br><a href="concertopreciso.php?id_concertopercantante='.$idconcerto.'&user='.$user.'">Vai al concerto</a></table></div><br>');
                    }
                }
                $con->close();
            ?>
        </center><br><br>
    </div>
</body>
</html>