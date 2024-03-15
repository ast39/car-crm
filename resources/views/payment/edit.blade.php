@php
    use App\Libs\Helper;
@endphp

@extends('layouts.app')

@section('title', 'Редактирование траты')

@section('content')
    <div class="card bg-primary text-white">
        <div class="card-header">{{ __('Редактирование траты') }}</div>

        <div class="card-body bg-light">
            <form method="post" action="{{ route('payment.update', $payment->payment_id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="car_id" class="form-label required">{{ __('Автомобиль') }}</label>
                    <select  class="form-control form-select" id="car_id" name="car_id">
                        @forelse($cars as $car)
                            <option {{ $car['car_id'] == $payment->car_id ? 'selected' : '' }} title="{{ Helper::carName($car) }}" value="{{ $car['car_id'] }}">{{ Helper::carName($car) }}</option>
                        @empty
                            <option title="Нет автомобилей" value="0">Нет автомобилей</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="car_id" class="form-label required">{{ __('Автомобиль') }}</label>
                    <select  class="form-control form-select" id="car_id" name="car_id">
                        @forelse($types as $type)
                            <option {{ $type['type_id'] == $payment->type_id ? 'selected' : '' }} title="{{$type['title'] }}" value="{{ $type['type_id'] }}">{{ $type['title'] }}</option>
                        @empty
                            <option title="Нет категорий" value="0">Нет категорий</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label required">{{ __('Название') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $payment->title ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label for="payment_date" class="form-label">{{ __('Дата заправки') }}</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ date('Y-m-d', $payment->created_at ?? time()) }}" />
                </div>

                <div class="mb-3">
                    <label for="mileage" class="form-label">{{ __('Пробег (км)') }}</label>
                    <input type="text" class="form-control" id="mileage" name="mileage" value="{{ $payment->mileage ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label required">{{ __('Стоимость') }}</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $payment->price ?? '' }}" />
                </div>

                <div class="mb-3">
                    <label for="additional" class="form-label">{{ __('Примечание') }}</label>
                    <textarea  cols="10" rows="5" class="form-control" id="additional" name="additional">{{ old('additional') }}</textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary me-1 rounded">{{ __('Назад') }}</a>
                    <button type="submit" class="btn btn-primary rounded">{{ __('Сохранить') }}</button>
                </div>
            </form>
        </div>

        <div class="card-footer bg-light border-0"></div>
    </div>
@endsection
