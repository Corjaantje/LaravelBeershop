<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>"Place Order"))
<div class="container">
    <h1>Place Order</h1>
    <p>Please confirm that all the information below is correct:</p>

    <h4>User Information</h4>
    <p><b>Name: </b>{{$user->firstName." ".$user->lastName}}</p>
    <p><b>Address: </b>{{$user->address.", ".$user->postalCode." ".$user->city}}</p>
    <br>
    <h4>Order</h4>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>Total</th>
        </tr>
        <?php $priceSum = 0 ?>
        @foreach($cart as $cartItem)
            <?php $totalPrice = $cartItem->amount*$cartItem->product->price; $roundedPrice = number_format($totalPrice,2); $priceSum += $roundedPrice;?>
            <tr>
                <td><img src='{{ URL::asset('assets/products/'.$cartItem->product->image_url) }}' width='50px' height='50px'></td><td>{{str_replace("_"," ",$cartItem->product->name)}}</td><td>{{$cartItem->amount}}</td><td> &euro;{{number_format($cartItem->product->price,2)}}</td>
                <td> &euro;{{$roundedPrice}}</td>
            </tr>
        @endforeach
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &euro;{{number_format($priceSum,2)}}</td>
    </table>
    <a class="button" href="/order/payment">To Payment</a>
</div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

