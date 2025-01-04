<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan') {
            return true;
        }

        abort(403, 'Unauthorized action.');
    }

    protected function canDelete(): bool
    {
        return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan';
    }

}
