<?php
include_once "zmienne.php";

function sprawdz(){
    $win=0;
    $tabela=$_SESSION['tabela'];
    for ($i=0; $i < 3; $i++) { 
        //w lini
        if ($tabela[$i][0]==1 && $tabela[$i][1]==1 &&$tabela[$i][2]==1 ){
            $win=1;
            break;
        }
        if ($tabela[$i][0]==2 && $tabela[$i][1]==2 &&$tabela[$i][2]==2 ){
            $win=2;
            break;
        }
        // w kolumnie
        if ($tabela[0][$i]==1 && $tabela[1][$i]==1 &&$tabela[2][$i]==1 ){
            $win=1;
            break;
        }
        if ($tabela[0][$i]==2 && $tabela[1][$i]==2 &&$tabela[2][$i]==2 ){
            $win=2;
            break;
        }
        //skosy
        if ($tabela[0][0]==2 && $tabela[1][1]==2 &&$tabela[2][2]==2 ){
            $win=2;
            break;
        }
        if ($tabela[0][0]==1 && $tabela[1][1]==1 &&$tabela[2][2]==1 ){
            $win=1;
            break;
        }
        if ($tabela[0][2]==2 && $tabela[1][1]==2 &&$tabela[2][0]==2 ){
            $win=2;
            break;
        }
        if ($tabela[0][2]==1 && $tabela[1][1]==1 &&$tabela[2][0]==1 ){
            $win=1;
            break;
        }
    }
    if($win==1){
        echo '<h3>wygrał 1</h3>';
        $_SESSION['tabela']=[[0,0,0],[0,0,0],[0,0,0]];
        return true;
    }
    elseif($win==2){
        echo '<h3>wygrał 2</h3>';
        $_SESSION['tabela']=[[0,0,0],[0,0,0],[0,0,0]];
        return true;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><section class='interfejs'>
    <div><?php echo "<h1>Ruch gracza: ".$_SESSION['gracz']."</h1>";
        sprawdz();
        $ile=0;
        for ($i=0; $i < 3; $i++) { 
            for ($j=0; $j < 3; $j++) { 
                if ($_SESSION['tabela'][$i][$j]!=0){
                    $ile++;
                }
            }
        }
        if ($ile==9){
            echo '<h3>Remis </h3>';
        }
    ?></div>
    <form action="dzialanie.php" method="post">
        <?php
            $ile=0;
            
            for ($i=1; $i < 4; $i++) { 
                echo "<p>";
               for ($j=1; $j < 4; $j++) { 
                if($_SESSION['tabela'][$i-1][$j-1]==0){
                    echo "<button name='xy' value='".$i."".$j."'></button>";
                }
                if($_SESSION['tabela'][$i-1][$j-1]==1){
                    echo '<button class="jeden" name="xy" value="00"><svg height="180" width="180">
                    <line x1="10" y1="10" x2="170" y2="170" style="stroke:white;stroke-width:15" />
                    <line x1="10" y1="170" x2="170" y2="10" style="stroke:white;stroke-width:15" /></svg></button>';
                    $ile++;
                }
                if($_SESSION['tabela'][$i-1][$j-1]==2){
                    echo '<button class="dwa" name="xy" value="00">
                    <svg height="180" width="180">
                        <circle r="60" cx="90" cy="90" fill="black" stroke="white" stroke-width="15" /></svg></button>';
                    $ile++;
                }
               }
               echo "</p>";
               
               if($ile==9 ){
      
                $_SESSION['tabela']=[[0,0,0],[0,0,0],[0,0,0]];

               }
            }
        ?>
    </form></section>

</body>
</html>
