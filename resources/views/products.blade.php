<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products page</title>
    
    <style>
        /* Styles for the container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f7f7f7;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }
            /* Styles for the table */
         table {
           width: 100%;
           border-collapse: collapse;
         }

           th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
            }

          th {
        background-color: #f8f8f8;
            }

         /* Styles for the h1 heading */
             h2 {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-size: 3em;
        margin-top: 30px;
        margin-bottom: 20px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #333;
          }

        /* Styles for the links */
         a {
        color: #333;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
            }

           a:hover {
              color: #555;
                  }

                /* Styles for the buttons */
                .btn {
        padding: 12px 30px;
        border: none;
        background-color: #333;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        border-radius: 40px;
        transition: all 0.2s ease-in-out;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
                    }

                /* Add hover effect to buttons */
                .btn:hover {
        background-color: #555;
        cursor: pointer;
                    }

                 /* Add image styles */
             img {
        width: 100%;
        max-width: 300px;
        height: auto;
        margin-top: 20px;
        border-radius: 20px;
                     }

                /* Add styles for the login/logout section */
                .login-section {
        text-align: right;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
                    }

             .admin-section {
        text-align: left;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
                 }

                    /* Add styles for the shopping cart section */
                 .cart-section {
        text-align: right;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
            }
        /* Add styles for the product list section */
        .product-list {
        margin-top: 20px;
                    }

             /* Styles for the modal */
             .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
                 }

             /* Modal Content/Box */
             .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
                 }

             /* The Close Button */
                .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
             }

             .close:hover,
             .close:focus {
        color: black;
        text-decoration: none;
            cursor: pointer;
          }
</style>


</head>
<body style=" text-align: center; background-image: url(https://img.freepik.com/free-photo/white-crumpled-paper-background-simple-diy-craft_53876-128183.jpg?w=2000)"> </div>
    @if(session()->has('user'))
    Utilizator logat: {{session()->get('user')['name']}}
    <br>
    <a href="logout">Logout</a>

    @if(str_contains(session()->get('user')['email'], "admin"))
    <br><br>
    <a href="createproduct">Add a new product</a> 
    @endif
    
    @else
    <a href="login">Log in</a> 
    @endif
    <div>
    <img src="https://1000logos.net/wp-content/uploads/2018/08/Sephora-symbol.jpg" alt="image" style="width: 400px; height: 100px;" > 
    </div>
    @if(!str_contains(session()->get('user')['email'], "admin"))
    <div style="text-align: right; margin: 2cm;">
       <h2> <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-svg-png-icon-download-28.png" alt="image" style="width: 30px; height: 30px;" > 
         <a href="cartlist">Cart</a> </h2>
      </div>
      @endif
    <br><br>

    <div class="container">
        <div class="row">
            <h2>Products </h2>
            <div class="col-md-12">               
                <table class="table">
                    <thead>
                        <tr>
                            <th>Products</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th></th>
                            @if(!str_contains(session()->get('user')['email'], "admin"))
                            <th>Do you want me?</th>
                            @endif
                            @if(str_contains(session()->get('user')['email'], "admin"))
                            <th>Admin secret part</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['price'] }} RON</td>
                            <td><img src="/images/{{$item['image']}}" width="150" height="200"></td>
                            
                            @if(!str_contains(session()->get('user')['email'], "admin"))
                            <td>
                                <form action="/addtocart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item['id']}}" readonly>
                                    <button type="submit">Add to cart</button>
                                </form>
                            </td>
                            @endif

                            @if(str_contains(session()->get('user')['email'], "admin"))
                            
                            <td><a href="delete-product/{{$item['id']}}" >Delete product</a></td>
                            <td><a href="edit/{{$item['id']}}">Edit product</a></td>

                            @endif
                        </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>