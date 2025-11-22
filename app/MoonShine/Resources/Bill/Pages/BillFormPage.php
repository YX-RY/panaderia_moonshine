<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Bill\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Bill\BillResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use App\MoonShine\Resources\Product\ProductResource;
use App\MoonShine\Resources\Client\ClientResource;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Throwable;


/**
 * @extends FormPage<BillResource>
 */
class BillFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                \MoonShine\UI\Fields\Text::make('Number', 'number')
                    ->required(),
                \MoonShine\UI\Fields\Date::make('Date', 'date')
                    ->required()
                    ->default(now()->toDateString()),
                \MoonShine\UI\Fields\Number::make('Total', 'total')
                    ->required()
                    ->step(0.01),
                BelongsTo::make(
                    'Client',
                    'client',
                    formatted: static fn (Client $model) => $model->name,
                    resource: ClientResource::class,
                )
                    ->required(),
                BelongsToMany::make(
                    'Products',
                    'products',
                    resource: ProductResource::class,
                )
                    ->fields([
                        \MoonShine\UI\Fields\Number::make('Quantity', 'quantity')
                            ->required()
                            ->min(1),
                    ])
                    ->creatable()
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'number' => 'required|string|max:255|unique:bills,number,' . $item->getKey(),
            'date' => 'required|date',
            'total' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
        ];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
