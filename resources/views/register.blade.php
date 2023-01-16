<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration page</title>
    <style>
         h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
                 }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin: 50px auto;
            max-width: 600px;
            text-align: center;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
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
        input[type="submit"]:hover {
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
    <h2> Register </h2>
    <div class="container">

        <form action="register" method="post">
            @csrf
            <input type="text" name="name" placeholder="Enter your name">
            <br>
            <input type="email" name="email" placeholder="Enter your email">
            <br>
            <input type="password" name="password" placeholder="Enter your password">
            <br>

            <input type="submit" value="Create account">
        </form>

        <h3><a href="login"><b><u>Try again to login</b></u></a> </h3>

    </div>
</body>
</html>