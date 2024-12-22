<!-- resources/views/items/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>تعديل العنصر</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">اسم العنصر</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">الصورة (اختياري)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">تحديث</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
@endsection
