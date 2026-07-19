
## Pdf
- mettre dans ThridPArty fpdf
```php
En general:
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont(Family, Style, Size);
$pdf->Cell(width, height, le texte);
$pdf->Ln();
$pdf->Cell(width, height, le texte);
$pdf->Output();


Afficher sur le navigteur:
$pdf->Output();

Telecharger:
$pdf->Output('D', 'ticket.pdf');

Sauvegarder qqpart:
$pdf->Output(
    'F',
    WRITEPATH . 'tickets/ticket.pdf'
);

Move to the next line:
$pdf->Ln(10);


Position:
$x = $pdf->GetX();
$y = $pdf->GetY();


Text color:
$pdf->SetTextColor(
    255,
    0,
    0
);

Text
$pdf->SetFont('Arial','B',12);


Remplir de couleur la cell:
$pdf->SetTextColor(
    255,
    0,
    0
);

Ajouter une ligne:
$pdf->Line(
    x1,
    y1,
    x2,
    y2
);

Ajouter des images:
$pdf->Image(
    path,
    x,
    y,
    width,
    height
);

```



Faire une table:
```php

$pdf->SetFont('Arial','B',12);


// Header

$pdf->Cell(70,10,'Produit',1);
$pdf->Cell(30,10,'Qté',1);
$pdf->Cell(40,10,'Prix',1);

$pdf->Ln();


// Rows

$pdf->Cell(70,10,'Pain',1);
$pdf->Cell(30,10,'2',1);
$pdf->Cell(40,10,'800',1);

$pdf->Ln();

$pdf->Cell(70,10,'Lait',1);
$pdf->Cell(30,10,'1',1);
$pdf->Cell(40,10,'1200',1);



```


Header and footer:
```php

class TicketPDF extends FPDF
{

    function Header()
    {
        $pdf->SetTitle(
            'Ticket Achat'
        );

        $this->SetFont('Arial','B',15);
        $this->Cell(
            0,
            10,
            'Supermarche',
            0,
            1,
            'C'
        );
    }


    function Footer()
    {
        $this->SetY(-15);

        $this->Cell(
            0,
            10,
            'Page '.$this->PageNo(),
            0,
            0,
            'C'
        );

    }

}

```



Avoir plusieurs et plsuier acaht detail:

```php

$currentAchat = null;

foreach ($rows as $row)
{

    if ($currentAchat != $row['id_achat'])
    {

        // New purchase

        printPurchaseHeader($row);

        $currentAchat = $row['id_achat'];

    }

    printPurchaseLine($row);

}

```

