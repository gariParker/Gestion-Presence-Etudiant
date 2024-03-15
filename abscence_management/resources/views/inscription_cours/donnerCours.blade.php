<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Cours</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

  <div class="container mt-4">
    <h1>Inscription aux Cours</h1>
    <h6>Inscription aux Cours pour {{ $nom_etudiant }}</h6>

    <!-- Label pour afficher le nom de l'étudiant concerné -->
    <label for="etudiant">Étudiant:</label>
    <span id="etudiant">{{ $nom_etudiant }}</span>

    @if(session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif

    <form action="/enregistrer-inscription" method="POST">
        @csrf
        <!-- Utilisez le nom de l'étudiant pour le label -->
        <input type="hidden" name="etudiant_id" value="{{ $etudiant->id }}">
        <!-- Utilisez le nom de l'étudiant pour le label -->
        <input type="hidden" name="etudiant_nom" value="{{ $nom_etudiant }}">
        <ul class="list-group mt-3">
            @foreach($cours as $cour)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $cour->nom_cours }}
                    <div class="form-check">
                        <!-- Utilisez l'ID du cours comme valeur -->
                        <input class="form-check-input" type="checkbox" name="cours_ids[]" value="{{ $cour->id }}" id="checkbox{{ $cour->id }}">
                        <label class="form-check-label" for="checkbox{{ $cour->id }}"></label>
                    </div>
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>
    </form>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>


</body>
</html>
