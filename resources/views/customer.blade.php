<h1>This is article controller</h1>
@foreach ($customer['data'] as $customer )

<h4>{{$customer['name']}}</h4>
<p>price : {{$customer['mainDetail']['purchasePrice']}}</p>
@endforeach
