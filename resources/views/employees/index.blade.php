@extends('layouts\layout')

@section('content')
    <h2>Список співробітників</h2>

    <a href="{{ route('employees.create') }}" class="btn btn-primary">Додати співробітника</a>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Компанія</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">Просмотр</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}
@endsection
