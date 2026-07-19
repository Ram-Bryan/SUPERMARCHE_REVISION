
Dans html:

<canvas id="pieChart"></canvas>


Dasn js:
```js


const ctx = document.getElementById("pieChart");

new Chart(ctx,{

    type:'pie',

    data:{

        labels:[
            'Pain',
            'Lait',
            'Biscuit'
        ],

        datasets:[{

            label:'Produits',

            data:[
                120,
                80,
                40
            ]

        }]
    }

});


```


produit le plus vendu:

## Vue
SELECT
    p.designation,
    SUM(ad.quantite) AS total
FROM achat_details ad
JOIN produit p
ON ad.id_produit = p.id_produit
GROUP BY p.id_produit
ORDER BY total DESC;


## Contorller

$result = $model->getSalesPerProduct();

$labels = [];
$data = [];

foreach($result as $row)
{
    $labels[] = $row['designation'];
    $data[] = $row['total'];
}

return view('dashboard',[
    'labels'=>$labels,
    'data'=>$data
]);


## Js
new Chart(ctx,{
    type:'pie',

    data:{
        labels: <?= json_encode($labels) ?>,

        datasets:[{
            data: <?= json_encode($data) ?>
        }]
    }
});