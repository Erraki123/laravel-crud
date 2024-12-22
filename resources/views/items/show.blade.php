<!-- resources/views/items/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $item->name }}</h1>
    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid mb-3" alt="{{ $item->name }}">
    <p>{{ $item->description }}</p>
    
    <a href="{{ route('items.index') }}" class="btn btn-secondary">رجوع</a>
@endsection
