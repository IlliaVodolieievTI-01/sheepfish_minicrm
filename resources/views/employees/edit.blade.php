@extends('layouts\layout')

@section('content')
    <h2>Редагувати співробітника</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Ім'я:</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Прізвище:</label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="company_id">Компанія:</label>
            <select name="company_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
    </form>
@endsection
