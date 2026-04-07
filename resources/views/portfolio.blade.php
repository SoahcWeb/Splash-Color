@extends('layout')

@section('content')
<h1>Portfolio</h1>

@if($items->isEmpty())
    <p>Aucune image dans le portfolio pour le moment.</p>
@else
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($items as $item)
            <div style="border: 1px solid #ccc; padding: 10px; width: 200px; text-align: center;">

                <img src="{{ asset('storage/'.$item->image_path) }}"
                     alt="{{ $item->title }}"
                     style="max-width: 100%; height: auto;">

                <h4>{{ $item->title }}</h4>

            </div>
        @endforeach
    </div>
@endif

@endsection
