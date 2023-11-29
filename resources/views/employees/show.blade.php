@extends('layouts\layout')

@section('content')
    <h2>Інформація про співробітника</h2>

    <p><strong>Ім'я:</strong> {{ $employee->first_name }}</p>
    <p><strong>Прізвище:</strong> {{ $employee->last_name }}</p>
    <p><strong>Компанія:</strong> {{ $employee->company->name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Телефон:</strong> {{ $employee->phone }}</p>

    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Редагувати</a>

    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Видалити</button>
    </form>
@endsection
