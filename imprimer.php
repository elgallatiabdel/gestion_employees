<?php
session_start();
if(!isset($_SESSION["user"]))
    header("location: ./index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information d'imprimer</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php 
    include "./tools.php";
    if(isset($_POST["id"])){
        $id=$_POST["id"];
        $res=detail($id)[0];
    }else{
        echo "champs manquant";
    }
?>

<body onload="window.print()">
    <div class="form_log">
        <div class="formulaire">
            <div class="barre"></div><br>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $res["id"] ; ?>" />
                <h2> Information </h2>
                <div class="form1">
                    <label for="nom">Nom</label><br>
                    <input class="input" type="text" name="nom" value="<?php echo $res["nom"] ;?>" disabled
                        id="nom" /><br><br>
                    <label for="prenom">Prenom</label><br>
                    <input class="input" type="text" name="prenom" value="<?php echo $res["prenom"] ;?>" id="prenom"
                        disabled /><br><br>
                    <label for="CIN">CIN</label><br>
                    <input class="input" type="text" name="cin" disabled value="<?php echo $res["cin"] ;?>"
                        id="CIN" /><br><br>
                    <label for="date_naissance">date de naissance</label><br>
                    <input class="input" disabled type="date" name="date_nais" value="<?php echo $res["date_nais"] ;?>"
                        id="date_naissance" /><br><br>
                    <label for="date_affectation">date d'affectation</label><br>
                    <input class="input" disabled type="date" name="date_aff" value="<?php echo $res["date_aff"] ;?>"
                        id="date_affectation" /><br><br>
                    <label for="budget">budget</label><br>
                    <input class="input" disabled type="text" name="budget" value="<?php echo $res["budget"] ;?>"
                        id="budget" />
                </div>
                <div class="form2">
                    <label for="PPR">PPR</label><br>
                    <input class="input" disabled value="<?php echo $res["ppr"] ;?>" type="number" name="ppr"
                        id="PPR" /><br><br>
                    <label for="grade">Grade</label><br>
                    <input class="input" disabled type="text" name="grade" value="<?php echo $res["grade"] ;?>"
                        id="grade" /><br><br>
                    <label for="echelle">Echelle</label><br>
                    <input class="input" disabled type="text" name="echelle" value="<?php echo $res["echelle"] ;?>"
                        id="echelle" /><br><br>
                    <label for="division">Division</label><br>
                    <input class="input" disabled type="text" name="division" value="<?php echo $res["aff_div"] ;?>"
                        id="division" /><br><br>
                    <label for="aal">AAL</label><br>
                    <input class="input" disabled type="text" name="aal" value="<?php echo $res["aff_aal"] ;?>"
                        id="aal" /><br><br>
                </div>
            </form>
        </div>
    </div>
</body>

</html>