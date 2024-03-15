<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des etudiants avec leurs cours </title>
    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">

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
        .sidebar {
            background: linear-gradient(to right, rgb(25, 25, 245), purple);
            color: white;
            padding: 20px;
            height: 901px;
        }

        .espacement_dropDown{
            position: relative;
            bottom: -166px;
        }

        .espacement{
            position: relative;
            bottom: -82px;
        }

        .espacementcopie{
            position: relative;
            bottom: -164px;
        }

        .espacementcopieDeux{
            position: relative;
            bottom: -246px;
        }

        .border-blue {
            border-color: blue ;
        }

        .border-purple {
            border-color: purple ;
        }

        h1{
            text-align: center;
            font-family: math;
            color: rgb(190, 28, 190);
        }

        h2{
            font-family: math;
        }

        thead{
            background: linear-gradient(to right, rgb(25, 25, 245), purple);
            color: white
        }

    </style>

</head>
<body>

    <div class="container-fluid">
        <div class="col-lg-10">
                    <h1>Liste des étudiants avec leurs cours</h1>
                    <a href="/cour" class="btn btn-primary">Retour</a>
                    <hr>
                    <div>
                        <table class="table table-bordered border-blue border-purple">
                            <thead>
                                <tr>
                                    <th>Étudiant</th>
                                    <th>Cours</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nom_etudiant_precedent = null;
                                @endphp
                                @foreach ($etudiantsAvecCours as $inscription)
                                    <tr>
                                        <td>
                                            @if (!is_null($inscription->etudiant) && $inscription->etudiant->nom != $nom_etudiant_precedent)
                                                {{ $inscription->etudiant->nom }}
                                                @php
                                                    $nom_etudiant_precedent = $inscription->etudiant->nom;
                                                @endphp
                                            @endif
                                        </td>
                                        <td>
                                            @if ($inscription->cours)
                                                {{ $inscription->cours->nom_cours }}
                                            @else
                                                Aucun cours suivi
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
    

</body>
</html>




