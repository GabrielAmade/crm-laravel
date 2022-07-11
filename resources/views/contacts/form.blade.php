@extends('layout.app')

@section('title', "Formulaire de contact")



@section('content')



<form action="{{route('contacts.store')}}" method="post" class="form">
    @csrf
    <div>
        <label><h1>Ajouter un contact</h1></label>
    </div>
<div>
    <label for="lastname">Nom</label><br>
    <input type="text" name="lastname" id="lastname" value="{{old('lastname')}}">
</div>
<br>
<div>
    <label for="firstname">Prénom</label><br>
    <input type="text" name="firstname" id="firstname" value="{{old('firstname')}}">
</div>
<br>
<div>
    <label for="phone">Téléphone</label><br>
    <input type="text" name="phone" id="phone" value="{{old('phone')}}">
</div>
<br>
<div>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="{{old('email')}}">
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