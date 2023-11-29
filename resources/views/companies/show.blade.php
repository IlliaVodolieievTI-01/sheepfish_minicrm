@extends('layouts\layout')

@section('content')
    <h2>Інформація про компанію</h2>

    <p><strong>Назва:</strong> {{ $company->name }}</p>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Логотип:</strong>
        @if ($company->logo)
            <img src="{{ asset('storage/' . str_replace('public/', '', $company->logo)) }}" alt="Логотип" style="width: 100px; height: 100px;">
        @else
            Немає логотипу
        @endif
    </p>
    <p><strong>Веб-сайт:</strong> {{ $company->website }}</p>

    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Редагувати</a>

    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Видалити</button>
    </form>
@endsection
