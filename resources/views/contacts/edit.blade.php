@extends('layout.app')

@section('title', "Formulaire de contact")




@section('content')

<form action="{{route('contacts.update', [$contact->id])}}" method="post" class="form">
    @method('PUT')
<div>
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname" value="{{$contact->lastname}}">
</div>
<br>
<div>
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" value="{{$contact->firstname}}">
</div>
<br>
<div>
    <label for="phone">Téléphone</label>
    <input type="text" name="phone" id="phone" value="{{$contact->phone}}">
</div>
<br>
<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$contact->email}}">
</div>
<button>Modifier</button>
</form>

@endsection
