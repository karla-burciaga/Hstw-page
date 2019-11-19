<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Heading;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\HasMany;

class Customer extends Resource
{
     /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Clientes';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Cliente';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Customer';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public function title (){
        return $this->name;
    }
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','name'
    ];
    public static $group = '(1) Administración de Usuarios';
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

            Heading::make('Datos'),
            Text::make('Nombre', 'name'),
            Text::make('Apellidos', 'lastname'),
            Date::make('Fecha de Nacimiento','dateOfBirth')->format('DD MMM YYYY'),
            Text::make('CURP','CURP'),
            Text::make('RFC','RFC'),
            Text::make('Correo','email'),
            (new Tabs('Relations', [
              HasMany::make('Direcciones','address', 'App\Nova\CustomerAddres')->singularLabel('Dirección')
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
