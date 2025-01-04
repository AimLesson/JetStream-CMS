<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect back to the same page after editing
        return $this->getResource()::getUrl('edit', ['record' => $this->record->id]);
    }

    public static function canCreateAnother(): bool
    {
        // Disable creating additional records
        return false;
    }

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan';
    }
}
