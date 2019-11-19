<?php

namespace App\Nova;

use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\PasswordConfirmation;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Silvanite\NovaToolPermissions\Role;

class User extends Resource
{
    /**
     * Resource name
     * @return string
     */
    public static function label()
    {
        return 'Usuarios';
    }

    /**
     * Resource name
     * @return string
     */
    public static function singularLabel()
    {
        return 'Usuario';
    }

    public static $group = '(1) Administración de Usuarios';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
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

            Heading::make('Usuario'),

            Text::make('Nombre', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Heading::make('Contraseña')->onlyOnForms(),

            Password::make('Contraseña', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            PasswordConfirmation::make('Confirmación de Contraseña'),

            (new Tabs('Relations', [
                BelongsToMany::make('Roles', 'roles', Role::class)->singularLabel('Rol'),
                BelongsToMany::make('Wishlist', 'wishlist', Wishlist::class)->singularLabel('Producto'),
                HasMany::make('Reseñas', 'reviews', 'App\Nova\Review')
                    ->singularLabel('Reseña'),
                HasMany::make('Comentarios', 'comments', 'App\Nova\Comment')
                    ->singularLabel('Comentario'),
                HasMany::make('Órdenes', 'orders', 'App\Nova\Order')
                    ->singularLabel('Orden'),
                HasMany::make('Direcciones', 'addresses', 'App\Nova\Address')
                    ->singularLabel('Dirección'),
                HasMany::make('Métodos de Pago', 'paymentMethods', 'App\Nova\PaymentMethod')
                    ->singularLabel('Método')
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
