@extends('layout.app')

@section('title', 'Liste d\'entreprises')

@section('content')

<ul>
    @foreach($entreprises as $entreprise)
    <h3>Entreprise : {{$entreprise->id}}</h3>
    <p>{{$entreprise->name}}</p>
    <p>{{$entreprise->status}}</p>
    <p>{{$entreprise->siren}}</p>
    <p>{{$entreprise->email}}</p>
    <p>{{$entreprise->phone}}</p>
    <button><a href="{{route('entreprises.edit', [$entreprise->id])}}">Editer</a></button>
    <button><a href="{{route('invoices.create')}}">Facture</a></button>
    <form action="{{route('entreprises.destroy', [$entreprise->id])}}" method="post" class="delete">
        @method('DELETE')
        <button>Supprimer</button>

    </form>

@endforeach
</ul>


@endsection

