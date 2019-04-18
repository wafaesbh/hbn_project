<!DOCTYPE html>
<html>

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-table.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	@yield("css")
	<title>hbn consulting</title>
</head>

<body>

		<div class="sidenav">
        <img src="{{asset('img/hbn.png')}}" class="imagemenu">
            <button class="dropdown-btn">Administration 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#">Gestion utilisateur</a>
            <a href="#">Gestion rôle</a>
          </div>
          <button class="dropdown-btn">Gestion client
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{route('ajouterClient')}}">Ajouter client</a>
            <a href="{{route('listeClient')}}">Liste des clients</a>
           
          </div>
            <button class="dropdown-btn">Vente
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="{{route('facture')}}">Saisie facture</a>
          <a href="{{route('liste')}}">Liste des saisies</a>
            <a href="#">Journal des ventes</a>
          </div>
          
        </div>
        


	@yield("body")

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
	@yield("js")
</body>

</html>
