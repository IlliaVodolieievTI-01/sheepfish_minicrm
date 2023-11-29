@extends('layouts\layout')
@section('content')
    <h2>Створити компанію</h2>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Назва компанії:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Логотип:</label>
            <input type="file" name="logo" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="website">Веб-сайт:</label>
            <input type="url" name="website" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
@endsection
