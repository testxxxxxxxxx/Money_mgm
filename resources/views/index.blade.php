<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form name="a" method="get" action="ShowResults">

    <label for="month">Podaj nazwe miesiąca</label>
    <select name="choose">
        @foreach($receipt as $r)

        <option value="{{$r->month}}">{{$r->month}}</option>

        @endforeach

    </select>

    <input type="submit" name="confirm" value="Check">

    </form>

</body>
</html>