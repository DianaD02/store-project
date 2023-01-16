<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a product</title>
        <style>
            body {
                background-color: #f1f1f1;
            }

            h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
                 }
            form {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                margin: 50px auto;
                max-width: 600px;
            }
            label {
                color: #333;
                font-weight: bold;
                margin-top: 10px;
                display: block;
            }
            input[type="text"], input[type="number"], input[type="file"] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: 1px solid #ccc;
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
    <h2>Create product</h2>
    <form action="createproduct" method="POST" enctype="multipart/form-data"> 

        @csrf

        <label for="name">Titlu</label>
        <input type="text" name="name" required>

        <label for="price">Pret</label>
        <input type="number" name="price" required>


        <label for="description">Descrierea produsului</label>
        <input type="text" name="description" required>


        <div>
            <label for="image">Imagine: </label>
            <input type="file" name="gallery" accept=".jpg, .jpeg, .png" value="" required>
        </div>

        <button type="submit">Creeaza produsul</button>

      </form>

      <h2><a href="/products"><b><u>Back to products</u></b></a></h2>
</body>
</html>