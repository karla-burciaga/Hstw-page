<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Illuminate\Http\Request;
use Jackabox\DuplicateField\DuplicateField;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use GeneaLabs\NovaGutenberg\Gutenberg;

class Page extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Páginas';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Página';
    }

    public static $group = '(6) Administración de Páginas Informativas';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Page';

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

            Heading::make('Imagen'),
            Image::make('Imagen', 'image')
                ->creationRules('required')
                ->updateRules('nullable'),

            Heading::make('Título'),
            TextWithSlug::make('Título', 'title')
                ->slug('slug'),
            Slug::make('URL', 'slug')
                ->showUrlPreview(env("APP_URL") . $this->slug),

            Heading::make('SEO'),
            Text::make('Título', 'seo_title')->rules('required'),
            Textarea::make('Descripción', 'seo_description')->rules('required'),
            Textarea::make('Keywords (Separados por coma)', 'seo_keywords')->rules('required'),

            Heading::make('Contenido'),
            Gutenberg::make('Contenido', 'content')->stacked()->hideFromIndex(),

            DuplicateField::make('Duplicate')
                ->withMeta([
                    'resource' => 'pages',
                    'model' => 'App\Page',
                    'id' => $this->id,
                ]),
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
