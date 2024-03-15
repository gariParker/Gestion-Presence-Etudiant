<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Choix</title>

     <style>
        body {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        section {
            text-align: center;
            width: 300px; /* Ajoutez une largeur fixe à chaque section si nécessaire */
            margin: 20px; /* Ajout de marges entre les sections */
        }

        h1 {
            font-size: 2rem;
            color: #fff;
            text-align: center;
            position: relative;
            bottom: 50px;
            left: -21px;
        }

        button:hover {
            background-color: #0056b3;
        }


    </style> 

    <style>
        

        body{
            font-family: sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url(fondBleuCiel.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        section{
            position: relative;
            max-width: 400px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            /* backdrop-filter: blur(55px); */
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
    </style>
    
</head>

<body>
    

    <form action="/LoginA" method="post">
        @csrf
        <h1>Présence des Etudiants</h1>
        <section>
            <h1>ADMIN</h1>
            <button type="submit">Se Connecter</button>
        </section>
    </form>

    <form action="/LoginP" method="post">
        @csrf
        <h1>à</h1>
        <section style="width: 350px">
            <h1>ENSEIGNANT</h1>
            <button type="submit">Se Connecter</button>
        </section>
    </form>

    <form action="/LoginC" method="post">
        @csrf
        <h1>l'école</h1>
        <section style="width: 350px">
            <h1>Etudiant</h1>
            <button type="submit">Se Connecter</button>
        </section>
    </form>

</body>
</html>
