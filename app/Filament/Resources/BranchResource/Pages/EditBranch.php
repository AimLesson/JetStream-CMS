<?php

namespace App\Filament\Resources\BranchResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\BranchResource;

class EditBranch extends EditRecord
{
    protected static string $resource = BranchResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        $user = auth()->user();
    
        // Superadmin and Yayasan have unrestricted access
        if ($user->role === 'superadmin' || $user->role === 'yayasan') {
            return true;
        }
    
        // Check if we are editing a specific record
        $record = $parameters['record'] ?? null;
    
        // Ensure we get a single record instance
        if (is_array($record)) {
            $record = reset($record); // Extract the first record if it's nested
        }
    
        if ($record instanceof \App\Models\Branch) {
            // Allow users with matching branch_id
            return $user->branch_id === $record->id;
        }
    
        // Default: Deny access
        return false;
    }
    
    
    
    
    
    
    
}
