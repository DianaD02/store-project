<?php 

use App\Http\Controllers\ProductsController;

$totalCartPrice = 0;

$productsList = [];

foreach($products as $item)
{
    $product = ProductsController::GetProductById($item);
    $price = $product->price;
    $totalCartPrice += intval($price);

    if(!in_array($item, $productsList))
    {
        array_push($productsList, $product);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <style>
        body {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
        }
        .cart-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin: 50px auto;
            max-width: 600px;
        }
        td {
            color: #333;
            font-weight: bold;
            padding: 12px 20px;
            margin: 8px 0;
        }
        img {
            width: 200px;
            height: 200px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            padding: 14px 20px;
            margin-top: 10px;
            display: block;
            text-align: center;
        }
        a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body style="background-image: url(https://img.freepik.com/free-photo/white-crumpled-paper-background-simple-diy-craft_53876-128183.jpg?w=2000)">
    <div class="cart-list">
        <div class="container">
            <div><h2> Cart<h2>
                <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-svg-png-icon-download-28.png" alt="image" style="width: 60px; height: 60px;">            
            </div>
            <table cellspacing=0 cellpadding=10>
                <tr>
                  <td>Product</td>
                  <td></td>
                  <td>Price</td>
                </tr>
        
                @foreach ($productsList as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td><img src="/images/{{$item->image}}" width="200" height="200"></td>
                        <td>{{ $item->price }} RON</td>
                        <td><a href="cart-delete-item/{{$item->id}}" class="btn btn-primary">Delete from cart</a></td>
                    </tr>
                @endforeach
            </table>
    <br>
            <div style="text-align: center"><h3><b>Total price: {{$totalCartPrice}} RON<b></h3></div>
    
        
            <a href="/products"><h2><b><u>Back to shopping</u></b></h2></a>
    
        </div>
    </div>
</body>
</html>