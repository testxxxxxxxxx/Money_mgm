<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('style.css')?>">
    
    <title>Application</title>
</head>
<body>

<div class="container">

<div class="form-group row">

<div class="col-md-6">

    <a href="/home">Powrót</a>

    <form name="a" method="get" action="getReceiptForm">

        <label for="name">Podaj nazwę rachunku: </label>
        <!-- input type="text" name="name"> --> 
        <select name="name">
            @foreach($categories as $c)
                
                <option value="{{$c->name}}">{{$c->name}}</option>

            @endforeach

        </select>
        <label for="month">Miesiąc: </label>
        <input type="text" name="month">
        <label for="value"> Podaj ilość produtów chyba że kategoria jest inna niż zakupy to wtedy wpisać 1</label>
        <input type="number" name="value">

        <input type="submit" value="Send">

    </form>

    @if($res==1)

        <form name="b" method="get" action="AddReceipt">

         @for ($v=0;$v<$value;$v++)

            <label for="product">Nazwa produktu: </label>
            <input type="text" name="product{{$v}}">
            <label for="price">Cena: </label>
            <input type="text" name="price{{$v}}">
            <input type="hidden" name="i" value="{{$v}}">
            <input type="hidden" name="name" value="{{$name_0}}">
            <input type="hidden" name="month_0" value={{$month_0}}>

        @endfor

            <input type="submit" name="confirm" value="Add">

        </form>

    @endif

</div>

</div>

</div>

</body>
</html>