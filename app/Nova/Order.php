<?php

namespace App\Nova;

use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nsavinov\NovaPercentField\Percent;

class Order extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Órdenes';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Orden';
    }

    public static $displayInNavigation = true;

    public static $group = '(4) Administración de Comercio';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Order';

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
            Heading::make('Número de Registro')->onlyOnDetail(),
            ID::make()->sortable(),

            Heading::make('Datos de Pago'),
            Text::make('Método', 'payment_method'),
            Text::make('Referencia', 'payment_id'),
            Boolean::make('Estatus', 'payment_status'),

            Heading::make('Usuario'),
            BelongsTo::make('Usuario', 'user', 'App\Nova\User'),

            Heading::make('Dirección'),
            Text::make('Nombre', 'name'),
            Text::make('Email', 'email'),
            Text::make('Teléfono', 'phone'),

            Text::make('Calle', 'street'),
            Text::make('Número', 'number'),
            Text::make('Colonia', 'district'),

            Text::make('Ciudad', 'city'),
            Text::make('Estado', 'state'),
            Text::make('Código Postal', 'postal_code'),

            Textarea::make('Comentarios', 'comments'),

            Heading::make('Datos de Orden'),
            Percent::make('Descuento', 'discount'),
            Currency::make('Total', 'order_total'),

            (new Tabs('Relations', [
                HasMany::make('Productos', 'carts', 'App\Nova\Cart')
                    ->singularLabel('Producto'),
            ]))->defaultSearch(true),
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
