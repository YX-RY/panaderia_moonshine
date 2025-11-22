<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\MoonShine\Resources\Client\Pages\ClientIndexPage;
use App\MoonShine\Resources\Client\Pages\ClientFormPage;
use App\MoonShine\Resources\Client\Pages\ClientDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Client, ClientIndexPage, ClientFormPage, ClientDetailPage>
 */
class ClientResource extends ModelResource
{
    protected string $model = Client::class;

    protected string $title = 'Clients';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ClientIndexPage::class,
            ClientFormPage::class,
            ClientDetailPage::class,
        ];
    }
}
