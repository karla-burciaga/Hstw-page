<?php

namespace App\Nova\Metrics;

use App\User;
use DateInterval;
use DateTimeInterface;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Value;

class NewUsers extends Value
{
    public function name()
    {
        return 'Nuevos Usuarios';
    }

    /**
     * Calculate the value of the metric.
     *
     * @param Request $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, User::class);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            30 => '30 Días',
            60 => '60 Días',
            365 => '365 Días',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  DateTimeInterface|DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'new-users';
    }
}
