<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Comment extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Comentarios';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Comentario';
    }

    public static $displayInNavigation = false;

    public static $group = '(2) Administración de Artículos';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Comment';

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
