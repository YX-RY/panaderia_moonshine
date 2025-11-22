<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Order\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;

use App\MoonShine\Resources\Order\OrderResource;

use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Number;

use App\MoonShine\Resources\Product\ProductResource;
use App\MoonShine\Resources\Client\ClientResource;

use App\Models\Product;
use App\Models\Client;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Throwable;


class OrderFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),

                // Quantity
                Number::make('Quantity', 'quantity')
                    ->required()
                    ->min(1),

                // BelongsTo Product
                BelongsTo::make(
                    'Product',
                    'product',
                    formatted: static fn (Product $p) => $p->name,
                    resource: ProductResource::class
                )
                    ->required(),

                // BelongsTo Client
                BelongsTo::make(
                    'Client',
                    'client',
                    formatted: static fn (Client $c) => $c->name,
                    resource: ClientResource::class
                )
                    ->required(),
            ]),
        ];
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id',
        ];
    }

    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
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
