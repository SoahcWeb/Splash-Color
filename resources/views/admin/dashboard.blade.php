@extends('layout')

@section('content')
    <h1>Bienvenue sur le Dashboard Admin</h1>
    <p>Accès réservé aux administrateurs.</p>
    <ul>
        <li><a href="{{ route('portfolio.index') }}">Gérer le portfolio</a></li>
        <!-- Ajouter d'autres liens pour la gestion future -->
    </ul>
@endsection
