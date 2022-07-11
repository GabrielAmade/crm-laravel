@extends('layout.app')

@section('title', 'Liste de contacts')

@section('content')

<ul>
@foreach($contacts as $contact)
<h3>Contact {{$contact->id}}</h3>
<p>{{$contact->lastname}}</p>
<p>{{$contact->firstname}}</p>
<p>{{$contact->phone}}</p>
<p>{{$contact->email}}</p>
<button><a href="{{route('contacts.edit', [$contact->id])}}">Editer</a></button>
<button><a href="{{route('invoices.create')}}">Facture</a></button>
<form action="{{route('contacts.destroy', [$contact->id])}}" method="post" class="delete">
    @method('DELETE')
    <button>Supprimer</button>
</form>


@endforeach
</ul>

@endsection