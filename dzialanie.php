<?php
session_start();
if(isset($_POST['xy'])){
    $x=$_POST['xy'][0];
    $y=$_POST['xy'][1];
    // echo $x," : ",$y; 
    if ($x==0 && $y==0){

    }else{
        // echo "tu";
        switch ($_SESSION['gracz']) {
        case 1:
            // echo "tu1";
            if($_SESSION['tabela'])
            $_SESSION['tabela'][$x-1][$y-1]=1;
            $_SESSION['gracz']=2;
            break;
        case 2:
            // echo "tu2";
            $_SESSION['tabela'][$x-1][$y-1]=2;
            $_SESSION['gracz']=1;
            break;
        default:
            echo "coś poszło nie tak" ;
            break;
    }
    }
    
    unset($_POST["xy"]);

}
header("Location: index.php");
?>