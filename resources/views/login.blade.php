<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <style>
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
        }
        .container {
             width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    
        form {
            margin-top: 20px;
        }
    
        form input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    
        form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        form input[type="submit"]:hover {
            background-color: #0d140e;
        }
    
        a {
            text-align: center;
            display: block;
            margin-top: 20px;
        }
    </style>
    
</head>

<body style="background-image: url(https://img.freepik.com/free-photo/white-crumpled-paper-background-simple-diy-craft_53876-128183.jpg?w=2000)">
    <h2> Welcome, please log in!  </h2>
    <div class="vertical-stack-layout" style="spacing: 30px; margin: 50px;">
        <div class="stack-layout" style="spacing: 20px;">
   
      <div class="container">

        <form action="login" method="post">
            @csrf
        
            <input type="email" name="email" placeholder="Enter your email">
            <br>
            <input type="password" name="password" placeholder="Enter your password">
            <br>

            <input type="submit" value="Have fun!">
        </form>

        <b><a href="register">If you don't have an account you can create one here!</a></b>

    </div>

</body>
</html>