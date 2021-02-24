<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Price Offer</title>
</head>
<body style="background-color: #e1e1e1;margin-top: 20px;">
<div style="background-color: white;width: 80%;margin: 0 auto;padding: 10px;border-radius:8px;box-shadow: 5px 5px 5px 5px #aaa;text-align: center;">
    <h1 style="text-align: center">Pool Configurator Price Offer</h1>
    <h3>{{$data['base_product']['name']}}</h3>
    <img style="width: 200px" src="{{$data['base_product']['media']}}" alt="">
    {!! $data['base_product']['description_long'] !!}
    <h4>price : {{$data['base_product']['price']}}</h4>

</div>

</body>
</html>
