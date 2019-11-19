<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Productos';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Producto';
    }

    public static $group = '(3) Administración de Productos';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Product';

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

            Heading::make('Título'),
            Text::make('Título', 'title'),

            Heading::make('Imagen'),
            Image::make('Imagen', 'image')
                ->creationRules('required')
                ->updateRules('nullable'),

            Image::make('Imagen Secundaria (Opcional)', 'image')
                ->creationRules('required')
                ->updateRules('nullable'),

            Heading::make('Precio'),
            Currency::make('Precio Base', 'price'),

            Heading::make('Inventario'),
            Text::make('SKU', 'sku'),
            Number::make('Stock', 'stock'),

            Heading::make('Descripción'),
            Textarea::make('Descripción (Opcional)', 'description'),

            Heading::make('Categorías'),
            BelongsTo::make('Categoría (Opcional) ', 'category', 'App\Nova\ProductCategory')->nullable(),
            BelongsTo::make('Subcategoría (Opcional) ', 'category', 'App\Nova\ProductSubcategory')->nullable(),

            (new Tabs('Relations', [
                HasMany::make('Imágenes', 'images', 'App\Nova\ProductImage')->singularLabel('Imagen'),
                HasMany::make('Atributos', 'attributes', 'App\Nova\Attribute')->singularLabel('Atributo'),
                BelongsToMany::make('Usuarios', 'users', 'App\Nova\User'),
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
