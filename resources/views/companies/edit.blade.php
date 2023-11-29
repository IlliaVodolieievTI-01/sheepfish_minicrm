@extends('layouts\layout')

@section('content')
    <h2>Редагувати компанію</h2>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Назва компанії:</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $company->email }}">
        </div>
        <div class="form-group">
            <label for="logo">Логотип:</label>
            <input type="file" name="logo" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="website">Веб-сайт:</label>
            <input type="url" name="website" class="form-control" value="{{ $company->website }}">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
    </form>
@endsection
