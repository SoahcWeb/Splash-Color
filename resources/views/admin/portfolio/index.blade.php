@extends('layout')

@section('content')
<h2>Gestion du portfolio</h2>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.portfolio.create') }}">Ajouter une nouvelle image</a>

<table border="1" cellpadding="10" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>

                <td>
                    <form action="{{ route('admin.portfolio.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="title" value="{{ $item->title }}">
                        <button type="submit">💾</button>
                    </form>
                </td>

                <td>
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" width="100">
                </td>

                <td>
                    <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Supprimer cette image ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
