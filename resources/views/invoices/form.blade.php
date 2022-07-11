@extends('layout.app')

@section('title', "Facture")




@section('content')

<form action="{{route('invoices.store')}}" method="post" class="form">
    @csrf
<div>
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="{{old('title')}}">
</div>
<br>
<div>
    <label for="date">Date</label>
    <input type="date" name="date" id="date" value="{{old('date')}}">
</div>
<br>
<div>
    <label for="priceht">Montant HT</label>
    <input type="text" name="priceht" id="priceht" value="{{old('priceht')}}">
</div>
<br>
<div>
    <label for="tva">Taux de tva</label>
    <input type="text" name="tva" id="tva" value="5.5">
</div>
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