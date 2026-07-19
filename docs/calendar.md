<div id="calendar"></div>


```js

document.addEventListener('DOMContentLoaded', function () {

    let calendar = new FullCalendar.Calendar(
    document.getElementById('calendar'),

    {

        initialView:'dayGridMonth',

        events:[
            {
                title:'Achat #1',
                start:'2026-07-01',
                backgroundColor:"green"

            },

            {
                title:'Achat #2',
                start:'2026-07-03',
                end:"2026-07-12"

            }
        ]

    }
);

calendar.render();

});



```

## fetch from DB;

### Controller:
public function events()
{

    $model = new AchatModel();

    $achats = $model->findAll();


    $events=[];


    foreach($achats as $achat)
    {

        $events[]=[
            "title"=>"Achat #".$achat['id_achat'],

            "start"=>$achat['date_achat']
        ];

    }


    return $this->response->setJSON($events);

}


## js

let calendar = new FullCalendar.Calendar(

document.getElementById('calendar'),

{

initialView:'dayGridMonth',

events:'/calendar/events'

}

);


calendar.render();