@extends('layouts\layout')

@section('content')
    <h2>Список компаній</h2>

    <a href="{{ route('companies.create') }}" class="btn btn-primary">Створити компанію</a>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Email</th>
            <th>Логотип</th>
            <th>Веб-сайт</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>
                    @if ($company->logo)
                        <img src="{{  asset('storage/' . str_replace('public/', '', $company->logo)) }}" alt="Логотип" style="width: 50px; height: 50px;">
                    @else
                        Немає логотипу
                    @endif
                </td>
                <td>{{ $company->website }}</td>
                <td>
                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">Перегляд</a>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Редагувати</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
@endsection
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

</body>
</html>
