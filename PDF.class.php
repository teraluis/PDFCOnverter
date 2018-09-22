<?php
class PDF extends FPDF {
    // Header
    function Header() {
        global $titre;
        // Logo
        $this->Image('cgi.png',15,2,200);
        $this->SetFont('Arial','B',16);
        $this->Cell(40,1,'MANRESA LUIS');
        // Saut de ligne
        $this->Ln(20);
    }
    //Body 
    function experience($texte) {
        $this->SetFont('Times','B',14);
        $this->SetDrawColor(0,80,180);
        $this->Cell(40,30,'EXPERIENCE');
        $this->Ln(20);
        $this->SetFont('Arial','',12);
        $this->MultiCell(120, 7,$texte);
    }
    function parcours_cgi($data){
        $this->SetFont('Arial','B',14);
        $this->Cell(40,15,'PARCOURS PROFESSIONNEL – CGI');
        $this->Ln(20);
        foreach ($data as $line){
            $this->SetFont('Arial','B',12);
            $titre = $line['PROJET']." ".$line['CLIENT']."- (".$line['dateDebut']." à ".$line['dateFin'].")";
            $this->Cell(40,5,$titre);
            $this->Ln(5);
            $this->SetFont('Arial','',12);
            $this->MultiCell(120,10,$line['DESCRIPTION']);
            $this->Ln(2);
        }
    }
    function parcours_autre($data){
        $this->SetFont('Arial','B',14);
        $this->Cell(40,15,'PARCOURS PROFESSIONNEL – Autre');
        $this->Ln(20);
        foreach ($data as $line){
            $this->SetFont('Arial','B',12);
            $titre = $line['PROJET']." ".$line['CLIENT']."- (".$line['dateDebut']." à ".$line['dateFin'].")";
            $this->Cell(40,5,$titre);
            $this->Ln(5);
            $this->SetFont('Arial','',12);
            $this->MultiCell(120,10,$line['DESCRIPTION']);
            $this->Ln(2);
        }
    }
    function scolarite($data){
        $this->SetFont('Arial','B',14);
        $this->Cell(40,15,'SCOLARITE');
        $this->Ln(15);
        foreach ($data as $line){
            $this->SetFont('Arial','',12);
            $titre = $line['TYPE'].",".$line['SPECIALITE'].",".$line['ETABLISEMENT'];
            $this->Cell(40,5,$titre);
            $this->Ln(3);
        }
    }
    function rectangle($experience) {
        // Arial gras 15
        $this->SetFont('Arial','B',15);

        $this->SetX(171);
        $this->SetY(30);
        // Couleurs du cadre, du fond et du texte
        $this->SetDrawColor(52, 152, 219);
        $this->SetFillColor(52, 152, 219);
        $this->SetTextColor(236, 240, 241);
        // Epaisseur du cadre (1 mm)
        $this->SetLineWidth(0.1);
        $this->Rect(140, 50, 171,200,"FD");
        $this->SetLeftMargin(140);
        $this->Cell(4,50,"EXPERIENCE APERCU");
        $this->Ln(10);
        $this->Cell(4,50,"SECTEURS");
        $this->SetY(70);
        foreach ($experience as $secteur){
            $this->Ln(2);
            $this->Cell(10,0,$secteur);
            $this->Ln(3);
        }
        // Saut de ligne
        $this->Ln(1);
    }
    // Footer
    function Footer() {
        $this->SetLeftMargin(0);
        $this->SetTextColor(105,105,105);
        $this->SetFont('Arial','',12);
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Adresse
        $this->Cell(40,5,'Confidentiel ',0,0,'C');
        $this->Cell(100,5,'-1-',0,0,'C');
    }
}