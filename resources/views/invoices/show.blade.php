@extends('layout.app')

@section('title', 'Factures')

@section('content')
<h2>Titre : {{$invoice->title}}</h2>
<h2>Date : {{$invoice->date}}</h2>
<h2>Numéro : {{$invoice->number}}</h2>
<h2>Montant ht : {{$invoice->priceht}}</h2>
<h3>TVA : {{$invoice->tva}}</h3>
<h3>TTC : {{$invoice->pricettc}}</h3>
@endsection
