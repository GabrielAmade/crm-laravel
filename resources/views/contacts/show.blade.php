@extends('layout.app')

@section('title', 'contact')

@section('content')
<div id="list">
<h2>Contact : {{$contact->lastname}}  {{$contact->firstname}}</h2>
<h3>Téléphone : {{$contact->phone}}</h3>
<h3>Email : {{$contact->email}}</h3>
</div>
@endsection