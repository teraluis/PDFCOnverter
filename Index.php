<?php
require('fpdf/fpdf.php');
require_once 'fpdi/src/autoload.php';
require('PDF.class.php');

$pdf = new PDF();
$pdf->AddPage();
$titre = 'CV CGI';
$pdf->SetTitle($titre);
$texte = "Résumé de votre expérience. En voici un exemple. Comptant plus de XX années d’expérience dans le secteur des technologies de l’information,NOM possède un vaste savoir-faire en gestion de projets et de comptes ainsi qu’en développement, documentation, codage, modification, mise à l’essai et mise en oeuvre de solutions technologiques.";
$pdf->experience($texte);
$cgi = array(
    array('PROJET'=>'projet','CLIENT'=>'client','dateDebut'=>'mm/aa','dateFin'=>'mm/aa','DESCRIPTION'=>'À titre de RÔLE, pour le PROJET... Brève description du projet en un paragraphe clair et concis.' ),
    array('PROJET'=>'projet','CLIENT'=>'client','dateDebut'=>'mm/aa','dateFin'=>'mm/aa','DESCRIPTION'=>'À titre de RÔLE, pour le PROJET... Brève description du projet en un paragraphe clair et concis.' )
);
$autre = array(
    array('PROJET'=>'projet autre','CLIENT'=>'client autre','dateDebut'=>'mm/aa','dateFin'=>'mm/aa','DESCRIPTION'=>'À titre de RÔLE, pour le PROJET... Brève description du projet en un paragraphe clair et concis.' ),
    array('PROJET'=>'projet b','CLIENT'=>'client b','dateDebut'=>'mm/aa','dateFin'=>'mm/aa','DESCRIPTION'=>'À titre de RÔLE, pour le PROJET... Brève description du projet en un paragraphe clair et concis.' )
);
$pdf->parcours_cgi($cgi);
$pdf->parcours_autre($autre);
$scolarite1 = array(
    array("TYPE"=>"Maitrise","SPECIALITE"=>"mon spécialite","ETABLISEMENT"=>"établisement scolaire")
);
$pdf->scolarite($scolarite1);
$experience = array(
    "le batiment","l aeronautique"
);
$pdf->rectangle($experience);

$pdf->Output();
?>