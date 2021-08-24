<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @isset($receipt)

        @foreach($receipt as $r)

            <form name="a" method="get" action="getUpdateReceiptForm">

            {{$r->id}} <br>
            {{$r->name}} <br>
            {{$r->products}} <br>
            {{$r->month}} <br>
            {{$r->price}} <br>

            <input type="hidden" name="id_r" value="{{$r->id}}">
            <input type="submit" value="Edit"> <br>

            </form>

            <form name="c" method="get" action="DeleteReceipt">

                <input type="submit" value="Delete">
                <input type="hidden" name="id_r" value="{{$r->id}}">

            </form>

            @if($res==1 && $id==$r->id)

            <form name="b" method="get" action="UpdateReceipt?id={{$r->id}}">

                <label for="price">Podaj: </label>
                <input type="number" name="price">
                
                <input type="hidden" name="id" value="{{$r->id}}">

                <input type="submit" name="sub" value="Edit">

            </form>

            @endif

        @endforeach

    @endisset
    
</body>
</html>