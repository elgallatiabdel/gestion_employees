<?php
session_start();
if(!isset($_SESSION["user"]))
    header("location: ./index.php");
?>
<?php
    include './tools.php';
    if (isset($_POST["nom"])&& isset($_POST["prenom"])&& isset($_POST["cin"])&& isset($_POST["date_nais"])
        && isset($_POST["date_aff"])&& isset($_POST["budget"])&& isset($_POST["grade"])&& isset($_POST["echelle"])){
            ajouter($_POST["nom"],$_POST["prenom"],$_POST["cin"],$_POST["date_nais"],$_POST["date_aff"],$_POST["budget"]
                ,$_POST["ppr"],$_POST["grade"],$_POST["echelle"],$_POST["aff_div"],$_POST["aff_aal"]);
            header("location:page_principale.php");   
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'ajoute</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div class="form_log">
        <header class="header">
            <nav>
                <ul>
                    <li><a href="./page_principale.php"> Acceuil </a></li>
                </ul>
            </nav>
        </header>
        <div class="formulaire">
            <div class="barre"></div><br>
            <form action="" method="POST">
                <h2> formulaire d'ajoute </h2>
                <div class="form1">
                    <label for="nom">Nom<span class="star">*</span></label><br>
                    <input class="input" type="text" placeholder=" entrez le nom " name="nom" id="nom"
                        selected="selected" required><br><br>
                    <label for="prenom">Prenom<span class="star">*</span></label><br>
                    <input class="input" type="text" disabled placeholder=" entrez le prenom " name="prenom" id="prenom"
                        required><br><br>
                    <label for="CIN">CIN<span class="star">*</span></label><br>
                    <input class="input" type="text" disabled placeholder=" entrez le CIN " name="cin" id="cin"
                        required><br><br>
                    <label for="date_nais">date de naissance<span class="star">*</span></label><br>
                    <input class="input" disabled type="date" placeholder=" entrez la de de naissance " name="date_nais"
                        id="date_nais" required><br><br>
                    <label for="date_aff">date d'affectation<span class="star">*</span></label><br>
                    <input class="input" disabled type="date" placeholder=" entrez la date d'affectation "
                        name="date_aff" id="date_aff" required><br><br>
                    <label for="budget">budget<span class="star">*</span></label><br>
                    <select class="input" disabled id="budget" name="budget" required>
                        <option value=""></option>
                        <?php
                        $bd=getbudget();
                        foreach($bd as $b){
                            echo '<option value='.$b['nom_bdg'].'>'.$b['nom_bdg'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form2">
                    <label for="PPR">PPR</label><br>
                    <input class="input" disabled type="number" placeholder=" entrez le PPR " name=" ppr" id="ppr" />
                    <label for="grade">Grade<span class="star">*</span></label><br>
                    <select class="input" disabled id="grade" name="grade" required>
                        <option value=""></option>
                        <?php
                        $gr=getgrade();
                        foreach($gr as $g){
                            echo '<option value="'.$g['nom_grd'].'">'.$g['nom_grd'].'</option>';
                        }
                        ?>
                    </select><br><br>
                    <label for="echelle">Echelle<span class="star">*</span></label><br>
                    <select class="input" disabled id="echelle" name="echelle" required>
                        <option value=""></option>
                        <?php
                        $echel=getechelle();
                        foreach($echel as $ech){
                            echo '<option value="'.$ech['nom_ech'].'">'.$ech['nom_ech'].'</option>';
                        }
                    ?>
                    </select><br><br>
                    <label>Affectation : <span class="star">*</span></label>
                    <input type="radio" disabled name="aff" id="div" class="radio" value="division" />Division
                    <input type="radio" disabled name="aff" id="aal" class="radio" value="aal" />AAL<br><br>
                    <label for="aff_div">Division</label><br>
                    <select class="input" disabled id="aff_div" name="aff_div">
                        <option value></option>
                        <?php
                        $div=getdivision();
                        foreach($div as $d){
                            echo '<option value="'.$d['nom_div'].'">'.$d['nom_div'].'</option>';
                        }
                        ?>
                    </select><br><br>
                    <label for="aff_aal">AAL</label><br>
                    <select class="input" disabled id="aff_aal" name="aff_aal">
                        <option value=""></option>
                        <?php
                        $aal=getaal();
                        foreach($aal as $al){
                            echo '<option value="'.$al['nom_aal'].'">'.$al['nom_aal'].'</option>';
                        }
                        ?>
                    </select><br><br>
                </div>
                <div class="button">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>