<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Saumini\Count\RelationshipCount;

class PortfolioCategory extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Categorías';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Categoría';
    }

    public static $displayInNavigation = true;

    public static $group = '(6) Administración de Páginas Informativas';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\PortfolioCategory';

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Heading::make('Número de Registro')->onlyOnDetail(),
            ID::make()->sortable(),

            Heading::make('Imagen'),
            Image::make('Imagen', 'image')
                ->creationRules('required')
                ->updateRules('nullable'),

            Heading::make('Título'),
            TextWithSlug::make('Título', 'title')->slug('slug'),
            Slug::make('URL', 'slug')->showUrlPreview(env("APP_URL") . "/portafolio" . $this->slug),

            Heading::make('SEO (Opcional)'),
            Text::make('Título', 'seo_title')->rules('nullable'),
            Textarea::make('Descripción', 'seo_description')->rules('nullable'),
            Textarea::make('Keywords (Separados por coma)', 'seo_keywords')->rules('nullable'),

            Heading::make('Descripción'),
            Textarea::make('Descripción (Opcional)', 'description')->alwaysShow(),

            RelationshipCount::make('Categorías', 'categories'),
            RelationshipCount::make('Proyectos', 'projects'),

            (new Tabs('Relations', [
                HasMany::make('Subcategorías', 'categories', 'App\Nova\PostSubcategory')->singularLabel('Subcategoría'),
                HasMany::make('Artículos', 'posts', 'App\Nova\PostSubcategory')->singularLabel('Artículo')
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
