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
    <title>Formulaire de modification</title>
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
    if(isset($_POST['modifier'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $cin=$_POST['cin'];
        $date_nais=$_POST['date_nais'];
        $date_aff=$_POST['date_aff'];
        $budget=$_POST['budget'];
        $ppr=$_POST['ppr'];
        if($ppr == "0" || $ppr == null) $ppr= null;
        $grade=$_POST['grade'];
        $echelle=$_POST['echelle'];
        $div=$_POST['aff_div'];
        $aal=$_POST['aff_aal'];
        modifier($id,$nom,$prenom,$cin,$date_nais,$date_aff,$budget,$ppr,$grade,$echelle,$div,$aal);
        header("location:page_principale.php");
} // Fin du test isset
?>

<body>
    <div class="form_log">
        <header class="header">
            <nav>
                <ul>
                    <li><a href="page_principale.php"> Acceuil </a></li>
                </ul>
            </nav>
        </header>
        <div class="formulaire">
            <div class="barre"></div><br>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $res["id"] ; ?>" />
                <h2> information détailler </h2>
                <div class="form1">
                    <label for="nom">Nom</label><br>
                    <input class="input" type="text" name="nom" value="<?php echo $res["nom"] ;?>" id="nom" /><br><br>
                    <label for="prenom">Prenom</label><br>
                    <input class="input" type="text" name="prenom" value="<?php echo $res["prenom"] ;?>"
                        id="prenom" /><br><br>
                    <label for="CIN">CIN</label><br>
                    <input class="input" type="text" name="cin" value="<?php echo $res["cin"] ;?>" id="CIN" /><br><br>
                    <label for="date_naissance">date de naissance</label><br>
                    <input class="input" type="date" name="date_nais" value="<?php echo $res["date_nais"] ;?>"
                        id="date_naissance" /><br><br>
                    <label for="date_aff">date d'affectation</label><br>
                    <input class="input" type="date" name="date_aff" value="<?php echo $res["date_aff"] ;?>"
                        id="date_aff" /><br><br>
                    <label for="budget">budget</label><br>
                    <select class="input" id="budget" type="text" name="budget" />
                    <?php
                            $bd=getbudget();
                            foreach($bd as $b){
                                if($b['nom_bdg']==$res['budget']){
                                    echo '<option value="'.$b['nom_bdg'].'" selected>'.$b['nom_bdg'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$b['nom_bdg'].'">'.$b['nom_bdg'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form2">
                    <label for="PPR">PPR</label><br>
                    <input class="input" value="<?php echo $res["ppr"] ;?>" type="number" name="ppr" id="PPR" /><br><br>
                    <label for="grade">Grade</label><br>
                    <select class="input" id="grade" type="text" name="grade" />
                    <?php
                        $gr=getgrade();
                        foreach($gr as $g){
                            if($g['nom_grd']==$res['grade']){
                                echo '<option value="'.$g['nom_grd'].'" selected>'.$g['nom_grd'].'</option>';
                            }
                            else{
                                echo '<option value="'.$g['nom_grd'].'">'.$g['nom_grd'].'</option>';
                            }
                        }
                    ?>
                    </select><br><br>
                    <label for="echelle">Echelle</label><br>
                    <select class="input" id="echelle" type="text" name="echelle" />
                    <?php
                        $echel=getechelle();
                        foreach($echel as $ech){
                            if($ech['nom_ech']==$res['echelle']){
                                echo '<option value="'.$ech['nom_ech'].'" selected>'.$ech['nom_ech'].'</option>';
                            }
                            else{
                                echo '<option value="'.$ech['nom_ech'].'">'.$ech['nom_ech'].'</option>';
                            }
                        }
                    ?>
                    </select><br><br>
                    <label for="division">Division</label><br>
                    <select class="input" id="aff_div" type="text" name="aff_div" />
                    <option value="null"></option>
                    <?php
                        $div=getdivision();
                        foreach($div as $d){
                            if($d['nom_div']==$res['aff_div']){
                                echo '<option value="'.$d['nom_div'].'" selected>'.$d['nom_div'].'</option>';
                            }
                            else{
                                echo '<option value="'.$d['nom_div'].'">'.$d['nom_div'].'</option>';
                            }
                        }
                    ?>
                    </select><br><br>
                    <label for="AAL">AAL</label><br>
                    <select class="input" id="aal" type="text" name="aff_aal" />
                    <option value="null"></option>
                    <?php
                        $aal=getaal();
                        foreach($aal as $al){
                            if($al['nom_aal']==$res['aff_aal']){
                                echo '<option value="'.$al['nom_aal'].'" selected>'.$al['nom_aal'].'</option>';
                            }
                            else{
                                echo '<option value="'.$al['nom_aal'].'">'.$al['nom_aal'].'</option>';
                            }
                        }
                        ?>
                    </select><br><br>
                </div>
                <div class="button">
                    <input type="submit" name="modifier" value="modifier" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>