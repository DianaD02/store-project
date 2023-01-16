<?php 
use App\Http\Controllers\ProductsController;

$targetedProduct = ProductsController::GetProductInfo($productId);
?>
<head>
    <title>Edit page</title>
    <style>
        body {
            background-image: url(https://img.freepik.com/free-photo/white-crumpled-paper-background-simple-diy-craft_53876-128183.jpg?w=2000);
            background-size: cover;
            background-position: center;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
        }
        .container {
            background-color: rgba(255,255,255,0.7);
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 10px;
            margin-top: 100px;
        }
        label {
            color: #333;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border:1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            }
            button[type="submit"] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
            }
            button[type="submit"]:hover {
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
<h2>Product edit</h2>
    <div class="container">
    <div class="row">
        <div class="col">
            <form action="edit-product" method="POST">

              @csrf



              <div>
                <input type="hidden" name="id" value="{{$targetedProduct['id']}}" readonly>
                </div>

              <div >
                <label for="name">Titlu</label>
                <input type="text" name="name" value="{{$targetedProduct['name']}}">
                </div>

                <div>
                    <label for="price">Pret</label>
                    <input type="number" name="price" value="{{$targetedProduct['price']}}">
                </div>

                <div>
                    <label for="description">Descriere</label>
                    <input type="text" name="description" value="{{$targetedProduct['description']}}">
                </div>
                <div>
                    <label for="image">Imagine</label>
                    <input type="file" name="gallery" accept=".jpg, .jpeg, .png" value="" required>
                </div>


                <button type="submit">Aplica modificarile</button>

            </form>
        </div>
    </div>

    <a href="/products" >Inapoi</a>
</div>
</body>