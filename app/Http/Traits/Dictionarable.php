<?php

namespace App\Http\Traits;

use App\Models\Article;
use App\Models\Car;
use App\Models\CarMark;
use App\Models\Note;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

trait Dictionarable {

    /**
     * Все валюты
     *
     * @return array
     */
    private function marks(): array
    {
        return CarMark::all()->sortBy('title')->toArray();
    }

    /**
     * Все мотоциклы
     *
     * @return array|null
     */
    protected function cars():? Collection
    {
        if (!Auth::check()) {
            return null;
        }

        return Car::with(['owner', 'works', 'catalog', 'gasoline', 'payments', 'notes'])
            ->where('owner_id', Auth::id())
            ->get();
    }

    /**
     * Все запчасти
     *
     * @return array
     */
    protected function articles(): array
    {
        return Article::where('client_id', Auth::id())
            ->get()
            ->toArray();
    }

    /**
     * Все заметки
     *
     * @return array
     */
    protected function notes(): array
    {
        return Note::where('client_id', Auth::id())
            ->get()
            ->toArray();
    }

    /**
     * Все типы трат
     *
     * @return array
     */
    private function payment_types(): array
    {
        return PaymentType::all()->sortBy('title')->toArray();
    }

}
