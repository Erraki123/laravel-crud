<!-- resources/views/items/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>إضافة عنصر جديد</h1>
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم العنصر</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">الصورة</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">إضافة</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
@endsection
