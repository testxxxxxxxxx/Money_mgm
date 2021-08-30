<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('style.css'); ?>">

    <title>Application</title>
</head>
<body>

<div class="container">

<div class="col-sm-6">

<div class="form-group row">

    <a href="/home">Powrót</a>

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

            echo "<div id='name".$i."'>".$categoriesTable[$i]['name']."</div>" ."<br>";
            echo "<div id='price".$i."'>".$categoriesTable[$i]["price"]."</div>"."<br>";

            $i++;
            
        ?>

        @endforeach

    @endisset

</div>

</div>

<script>

    let name=document.getElementById('name0');
    let price=document.getElementById('price0');
    let name1=document.getElementById('name1');
    let price1=document.getElementById('price1');
    let name2=document.getElementById('name2');
    let price2=document.getElementById('price2');

    @isset($categoriesTable)

        name.style.width='{{$categoriesTable[0]["price"]}}'+'px';
        price.style.width='{{$categoriesTable[0]["price"]}}'+'px';
        name1.style.width='{{$categoriesTable[1]["price"]}}'+'px';
        price1.style.width='{{$categoriesTable[1]["price"]}}'+'px';
        name2.style.width='{{$categoriesTable[2]["price"]}}'+'px';
        price2.style.width='{{$categoriesTable[2]["price"]}}'+'px';

    @endisset

</script>


</body>
</html>