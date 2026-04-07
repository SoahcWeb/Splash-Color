@extends('layout')

@section('content')
    <h1>Bienvenue sur le Dashboard Admin</h1>
    <p>Accès réservé aux administrateurs.</p>

    <h2>Gestion du portfolio</h2>

    <ul>
        <li>
            <a href="{{ route('admin.portfolio.create') }}">
                ➕ Ajouter une image
            </a>
        </li>

        <li>
            <a href="{{ route('admin.portfolio.index') }}">
                👁️ Voir le portfolio (site public)
            </a>
        </li>
    </ul>

@endsection
