@php
    use App\Libs\Helper;
    use App\Libs\GasolineHelper;
@endphp

@extends('layouts.app')

@section('title', 'Карточка автомобиля')

@section('content')
    <div class="card bg-primary text-white">

        <div class="card-header">{{ __('Карточка автомобиля') }}</div>

        <div class="card-body bg-light">

            <table class="table table-borderless">
                <tbody>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Модель') }}</th>
                    <td class="text-end">{{ Helper::carName($car) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Год выпуска') }}</th>
                    <td class="text-end">{{ $car->year }} г.</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Объем') }}</th>
                    <td class="text-end">{{ Helper::volume($car->volume) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Гос номер') }}</th>
                    <td class="text-end">{{ strtolower($car->number ?: ' - ') }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Vin номер') }}</th>
                    <td class="text-end">{{ $car->vin ?: ' - ' }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Описание автомобиля') }}</th>
                    <td class="text-end">{{ $car->additional ?: ' - ' }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Последний зафиксированный пробег') }}</th>
                    <td class="text-end">{{ Helper::mileage($car->max_mileage) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Пробег во владении') }}</th>
                    <td class="text-end">{{ Helper::mileage($car->car_mileage) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Расход топлива') }}</th>
                    <td class="text-end">{{ GasolineHelper::avgLiterToKm($car->fuel_expenses) }}</td>
                </tr>

                <tr class="border-bottom"><td colspan="2" class="bg-light"></td></tr>

                <tr class="border-bottom">
                    <th class="text-start">{{ __('Налоги и страховки') }}</th>
                    <td class="text-end">{{ Helper::price($car->osago_expensed + $car->rasko_expensed + $car->tax_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Штрафы') }}</th>
                    <td class="text-end">{{ Helper::price($car->penalty_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Паркинг') }}</th>
                    <td class="text-end">{{ Helper::price($car->parking_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Мойка') }}</th>
                    <td class="text-end">{{ Helper::price($car->washing_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Платежи по кредиту') }}</th>
                    <td class="text-end">{{ Helper::price($car->credit_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Потрачено на ремонт') }}</th>
                    <td class="text-end">{{ Helper::price($car->service_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Потрачено на топливо') }}</th>
                    <td class="text-end">{{ Helper::price($car->fuel_expensed) }}</td>
                </tr>
                <tr class="border-bottom">
                    <th class="text-start">{{ __('Стоимость 1км') }}</th>
                    <td class="text-end">{{ Helper::price($car->km_price, true) }}</td>
                </tr>
                </tbody>
            </table>

            <form method="post" action="{{ route('car.destroy', $car->car_id) }}">
                @csrf
                @method('DELETE')

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="{{ route('car.index') }}" class="btn btn-secondary me-1 rounded">Назад</a>
                    <a href="{{ route('car.edit', $car->car_id) }}" class="btn btn-warning me-1 rounded">Изменить</a>
                    <button type="submit" title="Delete" onclick="return confirm('Вы уверены, что хотите удалить автомобиль?')" class="btn btn-danger me-1 rounded">Удалить</button>
                    <a href="{{ route('car.create') }}" class="btn btn-primary rounded">Добавить автомобиль</a>
                </div>
            </form>
        </div>
    </div>
@endsection
