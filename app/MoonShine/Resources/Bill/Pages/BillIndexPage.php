<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Bill\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\Bill\BillResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\Client\ClientResource;
use App\Models\Client;
use MoonShine\Support\Enums\Color;
use MoonShine\Support\ListOf;
use Throwable;


/**
 * @extends IndexPage<BillResource>
 */
class BillIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            \MoonShine\UI\Fields\Text::make('Number', 'number')->sortable(),
            \MoonShine\UI\Fields\Date::make('Date', 'date')
                ->format('d.m.Y')
                ->sortable(),
            \MoonShine\UI\Fields\Number::make('Total', 'total')
                ->sortable()
                ->modifyRawValue(fn ($value) => '$' . number_format($value ?? 0, 2)),
            BelongsTo::make(
                'Client',
                'client',
                formatted: static fn (Client $model) => $model->name,
                resource: ClientResource::class,
            )->badge(Color::GREEN),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @return list<FieldContract>
     */
    protected function filters(): iterable
    {
        return [];
    }

    /**
     * @return list<QueryTag>
     */
    protected function queryTags(): array
    {
        return [];
    }

    /**
     * @return list<Metric>
     */
    protected function metrics(): array
    {
        return [];
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyListComponent(ComponentContract $component): ComponentContract
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
