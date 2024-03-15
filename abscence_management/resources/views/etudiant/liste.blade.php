<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud in laravel 10</title>
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

        .btn_acc{
            position: relative;
            top: 90px;
        }
         
        h1{
            text-align: center;
            font-family: math;
        }

        h2{
            font-family: math;
        }
    </style>
  </head>

  <body>
    {{-- @auth('admins')
        <div class="alert alert-success">
            Vous êtes connecté en tant qu'administrateur.
        </div>
    @endauth --}}



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <h2>Missing Manager</h2>
                <div class="btn_acc">
                    <a type="button" class="btn btn-primary" href="/premier">Page d'Accueil</a>
                </div>
                
                <div class="espacement_dropDown">
                    
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Gérer les étudiants
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/etudiant">Liste des étudiants</a></li>
                            <li><a class="dropdown-item" href="/ajouter">Ajouter un étudiant</a></li>
                        </ul>
                    </div>
                    
        
                    <div class="espacement">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"> 
                                Gérer les Cours
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="/cour">Liste des Cours</a></li>
                                <li><a class="dropdown-item" href="/ajoutCours/">Ajouter un cours</a></li>
                                <li><a class="dropdown-item" href="/listeEtudiantAvecCours/">Etudiant avec leurs cours</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="espacementcopie">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                Gérer la presence
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <li><a class="dropdown-item" href="/gestion">Faire l'appel</a></li>
                                <li><a class="dropdown-item" href="#">Détails d'abscence</a></li>
                                <li><a class="dropdown-item" href="#">Action 3</a></li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="espacementcopieDeux">
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                Déconnecter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <li><a class="dropdown-item" href="/acc">Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
    
    
    
            </div>
        
                <div class="col-lg-10">
                    <div class="col s12">
                            <h1>GESTION DES ETUDIANTS</h1>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <hr>
                            <a href="/ajouter" class="btn btn-primary">Ajouter un étudiant</a>
                            <hr>

                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénoms</th>
                                        <th>Classe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($etudiants as $etudiant)
                                        <tr>
                                            <td>{{ $etudiant->id }}</td>
                                            <td>{{ $etudiant->nom }}</td>
                                            <td>{{ $etudiant->prenom }}</td>
                                            <td>{{ $etudiant->classe }}</td>
                                            <td>
                                                <a href="/update-etudiant/{{ $etudiant->id }}" class="btn btn-info">Update</a>
                                                <a href="/delete-etudiant/{{ $etudiant->id }}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Delete</a>
                                                <a href="/inscription_cours/{{ $etudiant->id }}" class="btn btn-success">Donner du cours</a>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                    </div>
                </div>
        </div>
        
    </div>

    {{-- <script>
        @auth('admins')
            // Supprimer l'attribut 'disabled' des boutons pour activer tous les boutons
            document.getElementById('dropdownMenuButton1').removeAttribute('disabled');
            document.getElementById('dropdownMenuButton2').removeAttribute('disabled');
        @endauth
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

  </body>
</html>