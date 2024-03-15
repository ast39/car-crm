@php
    use App\Libs\Helper;
@endphp

<div class="col-md-3">
    <div class="card bg-primary text-white">
        @forelse($cars ?? [] as $car)
            <div class="card-header">
                <a href="{{ route('car.show', $car->car_id) }}" class="text-decoration-none {{ request()->route()->getName() == 'car.show' && $car_id == $car->car_id ? 'text-dark' : 'text-white' }}">
                    {{ Helper::carName($car) }} ({{ $car->year }})
                </a>
            </div>
            <div class="card-body bg-light p-0">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom">
                        <div class="ms-2 me-auto"><a href="{{ route('service.index', ['car' => $car->car_id]) }}" class="list-group-item-action text-decoration-none {{ stripos(request()->route()->getName(), 'service') !== false && request()->car == $car->car_id ? 'text-primary' : '' }}">{{ __('Сервис') }}</a></div>
                        <span class="badge bg-primary rounded-pill pt-1">{{ count($car->works) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom">
                        <div class="ms-2 me-auto"><a href="{{ route('article.index', ['car' => $car->car_id]) }}" class="list-group-item-action text-decoration-none {{ stripos(request()->route()->getName(), 'article') !== false && request()->car == $car->car_id ? 'text-primary' : '' }}">{{ __('Запчасти') }}</a></div>
                        <span class="badge bg-primary rounded-pill pt-1">{{ count($car->catalog) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom">
                        <div class="ms-2 me-auto"><a href="{{ route('gas.index', ['car' => $car->car_id]) }}" class="list-group-item-action text-decoration-none {{ stripos(request()->route()->getName(), 'gas') !== false && request()->car == $car->car_id ? 'text-primary' : '' }}">{{ __('Топливо') }}</a></div>
                        <span class="badge bg-primary rounded-pill pt-1">{{ count($car->gasoline) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom">
                        <div class="ms-2 me-auto"><a href="{{ route('payment.index', ['car' => $car->car_id]) }}" class="list-group-item-action text-decoration-none {{ stripos(request()->route()->getName(), 'payment') !== false && request()->car == $car->car_id ? 'text-primary' : '' }}">{{ __('Траты') }}</a></div>
                        <span class="badge bg-primary rounded-pill pt-1">{{ count($car->payments) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                        <div class="ms-2 me-auto"><a href="{{ route('note.index', ['car' => $car->car_id]) }}" class="list-group-item-action text-decoration-none {{ stripos(request()->route()->getName(), 'note') !== false && request()->car == $car->car_id ? 'text-primary' : '' }}">{{ __('Блокнот') }}</a></div>
                        <span class="badge bg-primary rounded-pill pt-1">{{ count($car->notes) }}</span>
                    </li>
                </ul>
            </div>
            <div class="card-footer bg-light border-0"></div>
        @empty
            <div class="card-header">{{ __('Гараж пуст') }}</div>
        @endforelse
    </div>

    <div class="d-grid gap-2 d-md-flex mt-3 mb-3 justify-content-md-center">
        <a href="{{ route('car.create') }}" class="btn btn-primary rounded">Добавить автомобиль</a>
    </div>
</div>
