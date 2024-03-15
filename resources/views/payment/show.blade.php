@php
    use App\Libs\Helper;
@endphp

@extends('layouts.app')

@section('title', 'Трата')

@section('content')
    <div class="card bg-primary text-white">
        <div class="card-header">{{ __('Трата') }}</div>

        <div class="card-body bg-light">

            <table class="table  table-borderless">
                <tbody>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Дата траты') }}</th>
                        <td class="text-end">{{ date('d.m.Y', $payment->created_at) }}</a></td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Автомобиль') }}</th>
                        <td class="text-end"><a class="text-primary" href="{{ route('car.show', $payment->car_id) }}">{{ Helper::carName($payment->car) }}</a></td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Категория') }}</th>
                        <td class="text-end">{{ $payment->type->title ?? ' - ' }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Пробег') }}</th>
                        <td class="text-end">{{ Helper::mileage($payment->mileage) }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Стоимость') }}</th>
                        <td class="text-end">{{ Helper::price($payment->price) }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="text-start">{{ __('Описание') }}</th>
                        <td class="text-end">{{ $payment->additional ?? ' - ' }}</td>
                    </tr>
                </tbody>
            </table>

            <form method="post" action="{{ route('payment.destroy', $payment->payment_id) }}">
                @csrf
                @method('DELETE')

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="{{ route('payment.index') }}" class="btn btn-secondary me-1 rounded">Назад</a>
                    <a href="{{ route('payment.edit', $payment->payment_id) }}" class="btn btn-warning me-1 rounded">Изменить</a>
                    <button type="submit" title="Delete" onclick="return confirm('Вы уверены, что хотите удалить трату?')" class="btn btn-danger me-1 rounded">Удалить</button>
                    <a href="{{ route('payment.create') }}" class="btn btn-primary rounded">Добавить трату</a>
                </div>
            </form>
        </div>

        <div class="card-footer bg-light border-0"></div>
    </div>
@endsection
