<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Heading;

class CustomerAddres extends Resource
{
     /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Direcciones';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Dirección';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\CustomerAddres';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Calle', 'street'),
            Text::make('Número Interior', 'interiorNumber'),
            Text::make('Número Exterior', 'outdoorNumber'),
            Text::make('Referencias', 'references'),
            Text::make('CP', 'postalCode'),
            Text::make('Colonia', 'colonia'),
            Text::make('Ciudad', 'city'),
            Text::make('Estado', 'state'),
            Text::make('País', 'country'),
            Heading::make('Clientes'),
            BelongsTo::make('Cliente', 'customer', 'App\Nova\Customer'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
