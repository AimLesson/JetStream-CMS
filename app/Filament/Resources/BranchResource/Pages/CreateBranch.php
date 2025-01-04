<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBranch extends CreateRecord
{
    protected static string $resource = BranchResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan';
    }   
}
