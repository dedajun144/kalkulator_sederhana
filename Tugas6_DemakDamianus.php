<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>PROGRAM KALKULATOR</title>
  </head>
  <body>
   
    
    <?php
    $b1 = [1,2,3,'+', 4,5,6,'-', 7,8,9,'*',0,'.','/','='];
    $bc = ['C'];
    $tombol='';
    if(isset($_POST['tombol']) && in_array($_POST['tombol'],$b1)){
        $tombol=$_POST['tombol'];
    }
    $hitungan='';
    if(isset($_POST['hitungan']) && preg_match('~^(?:[\d.]+[* /+-]?)+$~',$_POST['hitungan'],$out)){
        $hitungan=$out[0];    
    }
    $tampilan=$hitungan.$tombol;
    
    if($tombol=='C'){
        $tampilan='';
    }elseif($tombol=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$hitungan)){
        $tampilan.=eval("return $hitungan;");
    }
    echo "<div class='calc'>";
    echo "<form method='POST'>";
        echo "<div class='card'>";
            echo "<div class='card-body'>";
                echo "<input class='form-control inpt' type='text' name='hitungan' value='$tampilan' placeholder='0'";
                echo "<div class='card-number'>";
                
                    foreach(array_chunk($b1,4) as $chunk){
                        
                        foreach($chunk as $button){
                            echo "<button ",(sizeof($chunk)!=4?" ":"")," name='tombol' value='$button' class='btn btn-primary butn'>$button</button>";
                        }
                        
                    }
                        
                    foreach($bc as $clear){
                        echo "<button name='tombol' value='$clear' class='btn btn-primary butn-clear'>$clear</button>";
                    }
                   
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</form>";
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

<style>
    .calc{
    margin-top: 30px;
}

.card{
    width: 19em;
    margin-left: 80vh;
    box-shadow: 0 2px 3px rgb(104, 104, 104);
}
.inpt{
    width: 16em;
}
.butn{
    width: 63px;
    margin-left: 1px;
    margin-top: 6px;
    margin-bottom: 2px;
    
}
.butn-clear{
    width: 255px;
    margin-left: 1px;
    margin-top: 4px;
    margin-bottom: 2px;
    
}

</style>