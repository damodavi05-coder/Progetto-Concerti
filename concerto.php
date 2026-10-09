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
        
        #login{
            width: 600px;
            border-radius:20px;
            background-image:linear-gradient(to bottom right,#7D4D97, pink); 
            border: solid 5px #4C5C68;
            padding-left:20px;
            padding-top:20px;
        }
        .cantante{
            height:25%;
        }
        tr{
            width: 100%;
            height: 100px;
        }
        

    </style>
</head>
<body style="margin: 0;">
    <div id="barra">
        <table>
            <tr>
                <td class="sopra colore"><center><a href="index.php">Logout</a></center></td>
                <td class="sopra colore"><center><?php $user=$_GET['user']; echo "<a href='sito.php?user=".$_GET['user']."&ordine=ORDER BY cantante;'>Torna alla home</a>";?></center></td>
                <td class="sopra colore"><center ><img src="logo.png" alt="logo" width="75px"></center></td>
                <td class="sopra colore"><center > </center></td>
                <td class="sopra colore"><center >Benvenuto <?php $user=$_GET['user']; echo $_GET['user']."<br><a href='profilo.php?user=".$_GET['user']."'>Vai al profilo</a>";?></center></td>
            </tr>
        </table>
    </div><div id="corpo"><br><br><br>
                <center><div id="login">
                    
                                    <?php $con = new mysqli("localhost","root","","capolavoro");
                                    if (mysqli_connect_errno()) {
                                        echo("<br>Connessione non effettuata: ".mysqli_connect_error()."<BR>");
                                        exit();
                                    }
                                    $sql = "SELECT * FROM concertipercantante";
                                    $ris = $con->query($sql) or die ("Query fallita!"); 
                                    foreach($ris as $riga) 
                                    {
                                        $cantante=$riga["cantante"];
                                        //strcasecmp($_GET['cantante'], $cantante)
                                        if ($_GET['cantante']==$cantante) {
                                            $data=$riga["data"];
                                            $biglietti=$riga["biglietti"];
                                            $luogo=$riga["luogo"];
                                            $orainizio=$riga["orainizio"];
                                            $prezzo=$riga["prezzo"];
                                            $id_concertopercantante=$riga["id_concertopercantante"];
                                            echo '<table><tr class="cantante"><td rowspan="3"><center>';
                                            echo '<img src="'.$cantante.'.jpg" width="200px" height="200%" style="border-radius:20px;"><br><br>';
                                            echo'</td>
                                            <td><h1><center>Cantante: '.$cantante.'<br>Data concerto: '.$data.'<br>Luogo: '.$luogo.'<br>Ora inizio: '.$orainizio.'<br>Prezzo: €'.$prezzo.'</center></h1></td>
                                            </tr>
                                            <tr class="cantante">
                                                <td><center>Quanti comprare i biglietti?</center></td>
                                            </tr>
                                            <tr class="cantante">
                                                <td><center><a href="concertopreciso.php?user='.$_GET['user'].'&id_concertopercantante='.$id_concertopercantante.'">Clicca per acquistare</a></center></td>
                                            </tr></table><br><hr width="100%"><br>';
                                        }
                                    }
                                    $con->close();
                                    ?></center>
                                
                    </div>
                </center>
            </div>
</body>
</html>