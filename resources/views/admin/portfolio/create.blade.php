@extends('layout')

@section('content')
<h2>Ajouter une image au portfolio</h2>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulaire d'ajout --}}
<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Titre :</label>
        <input type="text" name="title">
    </div>

    <div>
        <label>Image :</label>
        <input type="file" name="image" required>
    </div>

    <button type="submit">Uploader</button>
</form>

<hr>

<h2>Liste des images du portfolio</h2>

@if($items->isEmpty())
    <p>Aucune image ajoutée pour l’instant.</p>
@else
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" width="120">
                    </td>
                    <td>
                        {{-- Formulaire pour modifier le titre inline --}}
                        <form action="{{ route('admin.portfolio.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="title" value="{{ $item->title }}">
                            <button type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        {{-- Formulaire pour supprimer l'image --}}
                        <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
