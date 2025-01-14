<!DOCTYPE html>
<head>
    <title>Sign Up Form</title>
    <style>
        body {
            font-family: serif ;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(recources/7.jpg);
            color: white; 
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgb(0, 0, 0);
            width: 100%;
            max-width: 400px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            padding: 5px;
        }

        label {
            font-weight: bold;
            font-size: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buttons .sign-up {
            background-color: #4CAF50;
            color: white;
        }

        .buttons .cancel {
            background-color: #f44336;
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;s
        }

        .login-link a {
            text-decoration: none;
            color: #007BFF;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="SignInData.php">
            <table>
                <tr>
                   <td><img src="recources/logo.png" alt="logo" width="150" height="150"></td> 
                   <td><h1>RENTITALL</h1></td>
                </tr>
                <tr>
                    <td><label htmlfor="email">email:</label></td>
                    <td><input type="text" id="email" name="email" placeholder="email@gmail.com"required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" placeholder="Password"required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="buttons">
                            <button type="button" class="cancel">Cancel</button>
                            <button type="submit" class="sign-up">Sign Up</button>
                        </div>
                    </td>
                </tr>
            </table>
            
        </form>
        <div class="login-link">
            Don't have account yet? <a href="SignUp.php"><b>Click here</b> to Sign up</a><br><br>
            © 2025.All rights reserved
            </div>
    </div>
</body>
</html>
