<?php
require 'conn.php';

if (!isset ($_SESSION['uid'])){
    header('location: index.php');
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <script src="./js/jquery.min.js"></script>
    <link rel='stylesheet' href='./css/bootstrap.css'/>
    <link rel="stylesheet" href="./css/css.css">
</head>
<body>

    <div class="container">
    <?php  
        //--------gae table
        $tabAwal = " <table class='table table-dark table-striped table-hover'> ";
        $tab1 = " <tr><td> ";
        $tab2 = " </td><td> ";
        $tabAkhir = " </td></tr></table> ";
    
        //--------query default--------
        $sql0 = "SELECT * FROM anggota";
        $run0 = mysqli_query($conn,$sql0);

        //--------fungsi ambil data--------
        function table($tab1,$tab2,$row){
            echo $tab1.$row['id'];
            echo $tab2.$row['username'];
            echo $tab2.$row['nama'];
            echo $tab2.$row['email'];
            echo $tab2.$row['telp'];
            echo $tab2.$row['waktu'];
        }
        
        echo $tabAwal;
        //--------Ambil variable GET (url)--------
        if(!empty($_GET['var'])){
            $AscDesc = $_GET['var'];

        //--------query Ascending & Descending--------
            $sqlASC = "SELECT * FROM anggota ORDER BY username ASC";
            $sqlDESC = "SELECT * FROM anggota ORDER BY username DESC";

        //--------eksekusi query--------
            $runASC = mysqli_query($conn, $sqlASC);
            $runDESC = mysqli_query($conn, $sqlDESC);
        
        //--------if else--------
            switch ($AscDesc){
                case 1:
                    //acsending
                    while($row = mysqli_fetch_assoc($runASC)){
                        table($tab1,$tab2,$row);
                    }
                    break;
                case 2:
                    //descending
                    while($row = mysqli_fetch_assoc($runDESC)){
                        table($tab1,$tab2,$row);
                    }
                    break;
                default:
                    echo "more than 2";
                    break;
            }
        }else{
            //--------gae nek var = kosong
            /*while($row = mysqli_fetch_assoc($run)){
                table($tab1,$tab2,$row);
            }*/
            while($row = mysqli_fetch_assoc($run0)){
                table($tab1,$tab2,$row);
            }
        }
        
        echo $tabAkhir;
    ?>
    </div>

    <button onclick="asc()">Ascending</button>
    <button onclick="desc()">descending</button>

    <script>
    function asc(){
        var AscDesc = 1;
        window.location = "admin.php?var="+AscDesc;
    }
    function desc(){
        var AscDesc = 2;
        window.location =  "admin.php?var="+AscDesc;
    }
    </script>
</body>
</html>