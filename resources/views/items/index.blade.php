<!-- resources/views/items/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">قائمة العناصر</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">إضافة عنصر جديد</a>
    
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">عرض</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
