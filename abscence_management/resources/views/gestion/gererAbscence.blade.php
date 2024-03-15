<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion d'absence</title>
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
            height: 2000px;
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
    </style>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <h2>Missing Manager</h2>

            <div class="btn_acc">
                <a type="button" class="btn btn-primary" href="/premier" >Page d'Accueil</a>
            </div>

            <div class="espacement_dropDown">
                <div class="dropdown">

                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                        Gérer les étudiants
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/etudiant">Liste des étudiants</a></li>
                        <li><a class="dropdown-item" href="/ajouter">Ajouter un étudiant</a></li>
                    </ul>
                </div>
    
                <div class="espacement">
                    <div class="dropdown">


                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" >
                                Gérer les Cours
                        </button>
                    
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="/cour">Liste des Cours</a></li>
                            <li><a class="dropdown-item" href="/ajoutCours">Ajouter un cours</a></li>
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
                            <li><a class="dropdown-item" href="/etudiant/gestion/">Faire l'appel</a></li>
                            <li><a class="dropdown-item" href="/etudiant/gestion/">Détails d'abscence</a></li>
                            <li><a class="dropdown-item" href="#">Action 3</a></li>
                        </ul>
                    </div>
                </div>

                <div class="espacementcopieDeux">
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                            Déconnexion
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <li><a class="dropdown-item" href="/acc">Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>




        </div>
        <!-- Colonne de gauche -->
        <div class="col-lg-7">
            <h1 class="text-center" style="color: blueviolet; font-family:'Gill Sans', 
            'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Veuillez choisir le cours</h1>
            <hr>
            
            @foreach($cours as $cour)
                <form action="/presence-etudiant" method="GET">
                    <input type="hidden" name="cours_id" value="{{ $cour->id }}">
                    <br>
                    <button type="submit" class="btn btn-primary">{{ $cour->nom_cours }}</button>
                </form>
            @endforeach
        
            <hr>
            @if($coursSelectionne)
                <h1 class="text-center">LISTE DES ÉTUDIANTS</h1>
                
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
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
                                    {{-- <a href="/gestion-abscence/{{ $etudiant->id }}" class="btn btn-success">Appel</a> --}}
                                    <form action="/gestion-abscence/{{ $etudiant->id }}" method="GET">
                                        <input type="hidden" name="cours_id" value="{{ $coursId }}">
                                        <button type="submit" class="btn btn-success">Appel</button>
                                    </form>
                                    <a href="{{ route('afficherHistorique', ['id' => $etudiant->id]) }}" class="btn btn-primary">Afficher Historique individuel</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            {{-- ==============HISTO============== --}}
                                <!-- Mini-tableau historique -->
                                <h2 class="text-center">Historique</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom Etudiant</th>
                                            <th>Nom Cours</th>
                                            <th>Etat</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($absences as $absence)
                                            <tr>
                                                <td>{{ $absence->id }}</td>
                                                <td>{{ $absence->etudiantt->nom }}</td>
                                                <td>{{ $absence->courss->nom_cours }}</td>
                                                <td>{{ $absence->etat }}</td>
                                                <td>{{ $absence->date_abscence }}</td>
                                                <td>{{ $absence->heure_abscence }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
        </div>
        
        
        <!-- Colonne de droite -->
        <div class="col-lg-3">
            <div class="container">
                <h2 class="text-center">Détails de l'étudiant</h2>

                <form action="/ajouter-info-etudiant" method="POST">
                    @csrf
                    @if(isset($etudiant))
                        <div class="mb-3">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="id" name="idEtudiant" value="{{ $etudiant->id }}"> 
                        </div>
                        <div class="mb-3">
                            <label for="id">ID Cours:</label>
                            <input type="text" class="form-control" id="id" name="idCours" value="{{ $coursId }}"> 
                        </div>
                        <div class="mb-3">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="prenom">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}">
                        </div>
                        <div class="mb-3">
                            <label for="classe">Classe</label>
                            <input type="text" class="form-control" id="classe" name="classe" value="{{ $etudiant->classe }}">
                        </div>
                    @endif
                    <input type="hidden" name="date_abscence" value="{{ $dateActuelle }}">

                    <button type="submit" class="btn btn-primary" name="etat" value="P">Présent</button>
                    <button type="submit" class="btn btn-warning" name="etat" value="R">Retard</button>
                    <button type="submit" class="btn btn-danger" name="etat" value="A">Absent</button>
                    <a href="" class="btn btn-info">Détails</a>
                </form>
                

                    <!-- Mini-tableau historique -->
                    <h2 class="text-center">Historique</h2>
                    <table id="historique-individuel" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom Etudiant</th>
                                <th>Nom Cours</th>
                                <th>Etat</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absences as $absence)
                                <tr>
                                    <td>{{ $absence->id }}</td>
                                    <td>{{ $absence->etudiantt->nom }}</td>
                                    <td>{{ $absence->courss->nom_cours }}</td>
                                    <td>{{ $absence->etat }}</td>
                                    <td>{{ $absence->date_abscence }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    

                
            </div>
        </div>
    </div>
</div>

@auth('admins')
    <script>
        // Supprimer l'attribut 'disabled' des boutons pour activer tous les boutons
        document.getElementById('dropdownMenuButton1').removeAttribute('disabled');
        document.getElementById('dropdownMenuButton2').removeAttribute('disabled');
    </script>
@endauth

<script>
    $(document).ready(function() {
        // Masquer le tableau par défaut
        $('#historique-individuel').hide();
        
        // Lorsque le bouton est cliqué
        $('.btn-primary').click(function() {
            // Afficher le tableau
            $('#historique-individuel').show();
            // Cacher le titre
            $(this).hide();
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</body>
</html>
