<?php
session_start();
$_SESSION['verif_page']=1;//numéro de page
$_SESSION['msg_error']="";//message d'erreur
$_SESSION['nom_service']="";//nom de service
$_SESSION['verif_user']=0;
$_SESSION['msg_succes']="";//message de succes
$_SESSION['type']="";//type de lisangaaa
$_SESSION['tour']="";//tour de lisanga
$_SESSION["ss"]=0;//nombre de tentatives d'authentification restant
$_SESSION["vt"]="";//message ajouté près de message d'erreur msg_error 
function chargerClasse($classe)
{

if (file_exists($path = 'controleurs/'.$classe .'.php') || file_exists($path = 'domaines/'.$classe .'.php'))
{
require $path;// On inclut la classe correspondante au paramètre passé.
}

} spl_autoload_register('chargerClasse');
//date et heure
$date_inscrip=date('d/m/y');
$heure_=date('H:i:s e');
ini_set('date.timezone', 'Africa/Kinshasa');
$date_inscrip="".$date_inscrip." ".$heure_;
//enregistrer la page visité par l'utilisateur
$gen=new generer_nouveau_id();
$oa=$gen->generer("ID_INFO","INFO_MAT");
$oid=$gen->generer("ID_PG","PAG_VIZ");
$info=new qui();
$info_mat_table_= new INFO_MAT($oa,$info->get_user_agent(),$info->get_ip(),$info->detect_os(),$info->detect_browser(),$info->get_lanaguage(),$date_inscrip);
$info_mat_table_->enregistrer();
$id_info_mat_new_connexion=$oa;
$_SESSION['id_info_mat_new_connexion']=$id_info_mat_new_connexion;
$uie= new PAG_VIZ($oid,"index.php",0,$id_info_mat_new_connexion,$date_inscrip);
$uie->enregistrer();
//$qq= new TENTATIVES(0,0,0,$id_info_mat_new_connexion,1,$date_inscrip,0,"Tentative d'authentification");
//echo"NBRE=".$qq->compter_ID_TENTATIVE(1);

//maintenance du système
$maintenance= new maintenance(0);
$v=$maintenance->afficher_tout();
foreach ($v as $i) {

        $lp=$i['ETAT'];
  
}
if($lp==1)
{
//lancement de la page maintenance
$_SESSION['lp']=1;
header('location:mainte.php');



    

}

?>




<!DOCTYPE html>
<html>
<head >
	<title>LISANGA, Investissons positivement!!!</title>
	<meta charset='utf-8'/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel='icon' href='images/lisanga1.jpg' type='image/x-icon'/>
<!-- lien pour le framwork boostrap-->
<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.min.css">
<link href="css/cssBoostrapTemplate/sticky-footer-navbar.css" rel="stylesheet">
<link href="css/cssBoostrapTemplate/product.css" rel="stylesheet">
<link href="css/cssBoostrapTemplate/blog.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cssPersonnel/style.css">
<meta name='author' content='LIKASA asbl' />

<meta name='copyright' content='LIKASA asbl' />
<meta name='robots' content='index' />
<meta name='google-site-verification' content='FNnqpnsaOQr2SbBFjSOvUPHZUWywriIMA_2edbqUphw' />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-158631865-2'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158631865-2');
</script>


</head>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="images/lisanga1.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
    LISANGA
  </a>
  <strong><i class="navbar-text">Version Bêta</i></strong>

</nav>
<!--date et heutre systeme:-->
<div class="card" style="box-shadow: 6px 4px 36px black;">
  <div class="card-header text-center">
  <img src='images/icons8_Watch_48px.png' width='30' height='30' class='d-inline-block align-top' alt='image mal chargée'>

   <strong>
     <i class="text-uppercase text-justify"> Date et heure système: 
       <?php

	
echo "".$date_inscrip;

  ?>
  </i>
  </strong>
  </div>
  
</div>
 

 


 
<body >
<div class="container">
  <div class="row align-items-center">
    <div class="col">
    	<div class="card" style="box-shadow: 6px 4px 36px black;">
    		<div class="card-body" style="box-shadow: 6px 4px 36px burlywood;">
          
    			<form method="post" action="t_user.php" class="col-sm-5 ">

          <div class="alert alert-success"  role="alert">
  <stong><i>Bienvenu(e)! Merci d'avoir choisi notre plateforme!!!</i></stong>
</div>


	<h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
	<div class="form-group">
	<img src='images/icons8_Circled_User_Male_Skin_Type_3_48px.png' width='30' height='30' class='d-inline-block align-top' alt='image mal chargée'><label class="text-dark">Utilisateur </label> <input type="text" name="user_" id="user_" placeholder="Nom d'utilisateur" class="form-control" data-toggle="tooltip" title="Saisissez votre nom d'utilisateur" style="box-shadow: 6px 4px 36px burlywood;">
	  </div>
	 <button type="submit" class="btn btn-primary ">Suivant</button>
</form>
<img src='images/icons8_Add_User_Group_Woman_Man_48px.png' width='30' height='30' class='d-inline-block align-top' alt='image mal chargée'>
<a href="creer_compte.php" class="c">Créer nouveau compte</a>

    		</div>
    	</div>
     
    </div>
<!--
    <div class="col-d-md-flex card">
    <img src='images/back2.png' width='170' height='auto' class='img-fluid' alt='image mal chargée'>


    </div>
!-->





</div>
</div>
<br>

<div class="card">
  <div class="card-header bg-light" style="font-family: Andalus,Castellar,Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size: 88px;">
  <strong><h5 class="card-title h3 mb-3 font-weight-normal">Comprendre LISANGA!</h5></strong>
  </div>
  <div class="card-body">
    <p class="card-text"><i><strong>
    <p class="alert alert-primary" role="alert"><span><img src='images/icons8_Paper_Money_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Gagner de l'argent en investissant votre temps ou votre argent!</span></p>
    <p class="alert alert-info" role="alert"><span><img src='images/icons8_Favorite_Folder_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Nous avons plus de 15 services d'investissement et de bien être uniquement pour vous!</span></p>

    <p class="alert alert-secondary" role="alert"><span><img src='images/icons8_Collaboration_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Votre réseau social!Communiquez et partagez avec vos amis et famille, et gagnez de l'argent!</span></p>
    <p class="alert alert-success" role="alert"><span><img src='images/Cash in Hand_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Trouvez le financement pour vos STARTUPS,projets d'entreprise, business,...</span></p>
    <p class="alert alert-danger" role="alert"><span><img src='images/icons8_Increase_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Faites entrer votre entreprise ou startUp dans notre marché boursier Finança.</span></p>
    <p class="alert alert-dark" role="alert"><span><img src='images/Money Transfer_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Envoyez et recevez de l'argent partout dans le monde!Nous intégrons tous les moyens nationaux et internationaux de transfert d'argent!</span></p>
    
    <p class="alert alert-warning" role="alert"><span><img src='images/icons8_Donate_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Demandez et Faites des Dons, Aunômes, liberalités, MABOZA, Dîmes, Soutiens fianciers et materiels,... partout dans le monde!</span></p>
    <p class="alert alert-info" role="alert"><span><img src='images/icons8_Romance_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Faites des recontres amoureuses pour finalité mariage!</span></p>
    
    <p class="alert alert-light" role="alert"><span><img src='images/icons8_Online_Support_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Vous voulez acheter quelque chose, cherchez-le ici. Nous viendrons vous le livrer!</span></p>


    <p class="alert alert-dark" role="alert"><span><img src='images/icons8_Money_Box_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Nous rensemblons pour vous les meilleures et fiables  façons de gagner de l'argent.</span></p>

    <p class="alert alert-primary" role="alert"><span><img src='images/lisanga1.jpg' width='70' height='70' class='d-inline-block align-top' style="border-radius: 145px 45px 15px 145px;" alt='image mal chargée' style="float: left;">
    Une plateforme d'investissement multiservice sûre et fiable.</span></p>

    <p class="alert alert-dark" role="alert"><span><img src='images/icons8_Handshake_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Nous voulons avoir toute votre confiance!</span></p>

    <p class="alert alert-success" role="alert"><span><img src='images/icons8_Heart_Health_48px_1.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Une plateforme de bien être!</span></p>

    <p class="alert alert-secondary" role="alert"><span><img src='images/icons8_Meeting_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Votre satisfaction est notre devoir, c'est pourquoi nous avons réservé toute une zone pour recueillir vos suggestions, remarques et questions. Donnez vos avis, remarques, suggestions et questions<a href="#" class="btn btn-success">ici</a></span></p>
    
    <p class="alert alert-warning" role="alert"><span><img src='images/icons8_Oak_Tree_48px.png' width='50' height='50' class='d-inline-block align-top' alt='image mal chargée' style="float: left;">
    Et plus encore!</span></p>
  </strong></i></p>
  </div>
</div>
<!-- version mobile de lisanga!-->  

<div class="card">
  <div class="card-header">
  <h5 class="card-title h3 mb-3 font-weight-normal">Version Mobile</h5>
  </div>
  <div class="card-body">
    <i><strong><p class="card-text">Voici la version mobile de la plateforme LISANGA que vous pouvez télécharger:</p>
    <a href="#" class="btn btn-success">Android</a></strong></i>
  </div>
</div>


<!-- ===================================!-->
<div class="card">
  <div class="card-header">
  <h5 class="card-title h3 mb-3 font-weight-normal">LIKASA(Mantra)</h5>
  </div>
  <div class="card-body">
    <i><strong><p class="card-text">La pauvreté est le manque d'autonomie, d'autonomisation et d'éducation financière.Ensemble, réduisons le taux de pauvreté en RDC et dans le monde!</p>
    <p class="card-text"><a href="#">Devenir membre de la communauté LIKASA.</a></p>
    <a href="#" class="btn btn-primary">Plus de détails</a></strong></i>
  </div>
</div>
</body>

<?php
  //mettre le footer
  include_once('footer.php');
  ?>
    
</html>





