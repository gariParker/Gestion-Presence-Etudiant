<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    {{-- <link rel="stylesheet" href="css/Style.css"> --}}
    <style>
        @font-face {
                font-family: 'LouisGeorgeCafe';
                src: url('font-police/Louis/George/Cafe/Bold.ttf') format('truetype');
        }

        body{
            font-family: 'LouisGeorgeCafe',sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url(fondBleuCiel.png); 
            /* background-color: rgb(26, 31, 31); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(2px);
        }


        /* styles pour la photo */




        section{
            position: relative;
            max-width: 400px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(55px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 3rem;
        }

        h1{
            font-size: 2rem;
            color: #fff;
            text-align: center;
        }

        .inputbox{
            position: relative;
            margin: 30px 0;
            max-width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.5s ease-in-out;
        }

        input:focus~label,
        input:valid~label
        {
            top: -5px;
        }

        .inputbox input{
            width: 100%;
            height: 60px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        .inputbox img{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2rem;
            top: 20px;
        }

        .forget{
            margin: 35px 0;
            font-size: 0.85rem;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .forget label{
            display: flex;
            align-items: center;
        }

        .forget label input{
            margin-right: 3px;
        }

        .forget a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .forget a:hover{
            text-decoration: underline;
        }

        button{
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background-color: rgb(255, 255, 255, 1);
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        button:hover{
            background-color: rgba(255, 255, 255, 0.5);
        }

        .register{
            font-size: 0.9rem;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }

        .register p a:hover{
            text-decoration: underline;
        }
        /* Colorer le message d'erreur d'authentification en rouge */

        .error-message {
            color: red;
            font-size: 18px;
            font-family: serif;
        }


    </style>
    
</head>
<body>
    <section>
        <form action="/verifierUser/traite" method="POST">
            @csrf
            <h1>ADMINISTRATEUR</h1>
            <!-- Afficher les erreurs d'authentification -->
            @if ($errors->has('auth'))
                <div class="alert alert-danger error-message">
                    {{ $errors->first('auth') }}
                </div>
            @endif
        
            <!-- Afficher toutes les erreurs -->
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="inputbox">
                <img src="images/icons8_mail_32.png" >
                <input type="text" name="nom_admin" required>
                <label for="">Nom d'utilisateur</label>
            </div>
            <div class="inputbox">
                <img src="images/icons8_lock_32.png" alt="">
                <input type="password" name="password_tow" required>
                <label for="">Mot de passe</label>
            </div>
            <div class="forget">
                <label for="">
                    <input type="checkbox" name="remember">Remember Me
                </label>
                <a href="#">Forget Password</a>
            </div>
            <button type="submit" >Log in</button>
            
            <div class="register">
                <p>Don't have an Account
                    <a href="UserCount.php">Register</a>
                </p>
            </div>
        </form>
        
    </section>
</body>
</html>

