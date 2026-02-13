<?php

namespace App\Services;

use App\Actions\Service\StoreServiceAction;
use Illuminate\Support\Facades\DB;

class ServiceModelService
{
    public function create(array $data): void
    {
        DB::transaction(function () use ($data) {
            app(StoreServiceAction::class)->execute($data);
        });
    }
}