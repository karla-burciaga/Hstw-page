<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class PostSubcategory extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Subcategorías del Blog';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Subcategoría';
    }

    public static $displayInNavigation = false;

    public static $group = '(2) Administración de Artículos';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\PostSubcategory';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Heading::make('Número de Registro')->onlyOnDetail(),
            ID::make()->sortable(),

            Heading::make('Título'),
            TextWithSlug::make('Título', 'title')->slug('slug'),
            Slug::make('URL', 'slug')->showUrlPreview(env("APP_URL") . $this->slug),

            Heading::make('Imagen'),
            Image::make('Imagen (Opcional)', 'image')
                ->creationRules('nullable')
                ->updateRules('nullable'),

            Heading::make('Descripción'),
            Textarea::make('Descripción (Opcional)', 'description')->alwaysShow(),

            Heading::make('Categoría'),
            BelongsTo::make('Categoría', 'category', 'App\Nova\PostCategory'),

            HasMany::make('Artículos', 'posts', 'App\Nova\Post')->singularLabel('Artículo')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
