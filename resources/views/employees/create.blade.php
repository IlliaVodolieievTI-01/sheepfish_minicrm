@extends('layouts\layout')

@section('content')
    <h2>Додати працівника</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Ім'я:</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Прізвище:</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="company_id">Компанія:</label>
            <select name="company_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
@endsection
