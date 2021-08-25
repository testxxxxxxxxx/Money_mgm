<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">

<div class="col-sm-6">

<div class="form-group">

    <form name="a" method="get" action="ShowResults">

    <label for="month">Podaj nazwe miesiąca</label>
    <select name="choose" class="form-control">
        @foreach($receipt as $r)

        <option value="{{$r->month}}">{{$r->month}}</option>

        @endforeach

    </select>

    <input type="submit" name="confirm" value="Check" class="form-control">

    </form>

    <?php $i=0; ?>

    @isset($categoriesTable)

        @foreach($categoriesTable as $ct)

        <?php

            echo "<div>".$categoriesTable[$i]['name']."</div>" ."<br>";
            echo "<div>".$categoriesTable[$i]["price"]."</div>"."<br>";

            $i++;
            
        ?>

        @endforeach

    @endisset

</div>

</div>


</body>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    /*var userData = <?php echo json_encode($categoriesTable)?>;

    Highcharts.chart('container', {
        title: 
            text: 'New User Growth, 2020'
        ,
        subtitle: 
            text: 'Source: zentica-global.com'
        ,
        xAxis: 
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        ,
        yAxis: 
            title: 
                text: 'Number of New Users'
            
        ,
        legend: 
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        ,
        plotOptions: 
            series: 
                allowPointSelect: true
            
        ,
        series: [
            name: 'New Users',
            data: userData
        ],
        responsive: 
            rules: [
                condition: 
                    maxWidth: 500
                ,
                chartOptions: 
                    legend: 
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    
                
            ]
        
    });*/

</script>
</html>