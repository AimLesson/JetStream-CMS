<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBranch extends EditRecord
{
    protected static string $resource = BranchResource::class;

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
