@extends('layout.app')

@section('title', "Formulaire de contact")




@section('content')

<form action="{{route('entreprises.store')}}" method="post" class="form">
    @csrf
    <div>
        <label><h1>Ajouter une entreprise</h1></label>
    </div>
<div>
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" value="{{old('name')}}">
</div>
<br>
<div>
    <label for="status">Statut de l'entreprise</label>
    <input type="text" name="status" id="status" value="{{old('status')}}">
</div>
<br>
<div>
    <label for="siren">Numéro SIREN</label>
    <input type="number" name="siren" id="siren" value="{{old('siren')}}">
</div>
<br>
<div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{old('email')}}">
</div>
<br>
<div>
    <label for="phone">Téléphone</label>
    <input type="text" name="phone" id="phone" value="{{old('phone')}}">
</div>
<br>
<button>Valider</button>
</form>

<div>
    @if ($errors->any())
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
@endif
</div>

@endsection