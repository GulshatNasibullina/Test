<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Подтверждённые участники</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Кличка</th>
                <th>Возраст</th>
                <th>Порода</th>
                <th>Окрас</th>
                <th>Контакт хозяина</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uhastniki as $uhastniki)
            <tr>
                <td>{{ $uhastniki->nickname }}</td>
                <td>{{ $uhastniki->age }}</td>
                <td>{{ $uhastniki->breed }}</td>
                <td>{{ $uhastniki->color }}</td>
                <td>{{ $uhastniki->user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</body>
</html>