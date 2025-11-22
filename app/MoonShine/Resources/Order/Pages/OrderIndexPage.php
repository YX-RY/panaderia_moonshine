<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Order\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;

use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Date;   // <-- IMPORTANTE

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\Product\ProductResource;
use App\MoonShine\Resources\Client\ClientResource;

use App\Models\Product;
use App\Models\Client;


class OrderIndexPage extends IndexPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),

            Number::make('Quantity', 'quantity'),

            BelongsTo::make(
                'Product',
                'product',
                formatted: static fn (Product $p) => $p->name,
                resource: ProductResource::class
            ),

            BelongsTo::make(
                'Client',
                'client',
                formatted: static fn (Client $c) => $c->name,
                resource: ClientResource::class
            ),

            // ⬇⬇⬇ CAMPO CORRECTO PARA LA FECHA ⬇⬇⬇
            Date::make('Created At', 'created_at')
                ->format('Y-m-d H:i'),
        ];
    }

    protected function topLayer(): array
    {
        return [...parent::topLayer()];
    }

    protected function mainLayer(): array
    {
        return [...parent::mainLayer()];
    }

    protected function bottomLayer(): array
    {
        return [...parent::bottomLayer()];
    }
}
