<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form name="a" method="get" action="getReceiptForm">

        <label for="name">Podaj nazwę rachunku: </label>
        <input type="text" name="name">
        <input type="text" name="month">
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

</body>
</html>