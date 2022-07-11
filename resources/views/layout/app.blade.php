<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="navbar">
    <nav>
        <a href="{{route('contacts.create')}}">Ajouter un contact</a>
        <a href="{{route('contacts.index')}}">Liste des contacts</a>
        <a href="{{route('entreprises.create')}}">Ajouter une entreprise</a>
        <a href="{{route('entreprises.index')}}">Liste des entreprises</a>
        <a href="{{route('invoices.index')}}">Factures</a>

    </nav>
</div>

    @yield('h1')

    @yield('content')
    
</body>
</html>