@extends('layout.app')

@section('title', "Facture")




@section('content')

<form action="{{route('invoices.update', [$invoice->id])}}" method="post" class="form">
    @csrf
    @method('PUT')
<div>
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="{{$invoice->title}}">
</div>
<br>
<div>
    <label for="date">Date</label>
    <input type="date" name="date" id="date" value="{{$invoice->date}}">
</div>
<br>
<div>
    <label for="priceht">Montant HT</label>
    <input type="text" name="priceht" id="priceht" value="{{$invoice->priceht}}">
</div>
<br>
<div>
    <label for="tva">Taux de tva</label>
    <input type="text" name="tva" id="tva" value="{{$invoice->tva}}">
</div>
<button>Modifier</button>
</form>


@endsection