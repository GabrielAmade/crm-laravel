@extends('layout.app')

@section('title', 'Entreprise')

@section('content')
<h2>Nom : {{$entreprise->name}}</h2>
<h2>Statut de l'entreprise : {{$entreprise->status}}</h2>
<h2>Numéro SIREN : {{$entreprise->siren}}</h2>
<h3>Email : {{$entreprise->email}}</h3>
<h3>Téléphone : {{$entreprise->phone}}</h3>
@endsection





