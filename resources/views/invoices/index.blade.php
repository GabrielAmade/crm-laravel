@extends('layout.app')

@section('title', 'Liste d\'entreprises')

@section('content')

<ul>
    @foreach($invoices as $invoice)
    <h3>Entreprise : {{$invoice->id}}</h3>
    <p>{{$invoice->title}}</p>
    <p>Date de création : {{$invoice->date}}</p>
    <p>Prix Hors taxe : {{$invoice->priceht}}</p>
    <p>TVA : {{$invoice->tva}}</p>
    <p>Prix TTC : {{$invoice->pricettc}}</p>
    <button><a href="{{route('invoices.edit', [$invoice->id])}}">Editer</a></button>
    <form action="{{route('invoices.destroy', [$invoice->id])}}" method="post" class="delete">
        @method('DELETE')
        <button>Supprimer</button>
    <button><a href="{{route('invoices.create')}}">Facture</a></button>
    </form>

@endforeach
</ul>


@endsection

