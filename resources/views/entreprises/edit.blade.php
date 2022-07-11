@extends('layout.app')

@section('title', "Formulaire de contact")




@section('content')

<form action="{{route('entreprises.update', [$entreprise->id])}}" method="post" class="form">
    @method('PUT')
<div>
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" value="{{$entreprise->name}}">
</div>
<br>
<div>
    <label for="status">Statut de l'entreprise</label>
    <input type="text" name="status" id="status" value="{{$entreprise->status}}">
</div>
<br>
<div>
    <label for="siren">Numéro SIREN</label>
    <input type="number" name="siren" id="siren" value="{{$entreprise->siren}}">
</div>
<br>
<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$entreprise->email}}">
</div>
<br>
<div>
    <label for="phone">Téléphone</label>
    <input type="text" name="phone" id="phone" value="{{$entreprise->phone}}">
</div>
<br>
<button>Modifier</button>
</form>


@endsection