<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public static function canAccess(array $parameters = []): bool
{
    $user = auth()->user();

    // Superadmin and Yayasan have access
    if ($user->role === 'superadmin' || $user->role === 'yayasan') {
        return true;
    }

    // Branch Manager access based on branch_id
    if ($user->role === 'branch_manager') {
        $branchId = $parameters['branch_id'] ?? null;
        return $branchId && $user->branch_id === $branchId;
    }

    // Default: No access
    return false;
}

}
