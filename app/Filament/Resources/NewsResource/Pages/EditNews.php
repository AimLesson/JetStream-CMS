<?php

namespace App\Filament\Resources\NewsResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\NewsResource;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan' || auth()->user()->role === 'kepala_sekolah'),
        ];
    }
    

    public static function canAccess(array $parameters = []): bool
    {
        $user = auth()->user();
    
        // Superadmin and Yayasan have unrestricted access
        if ($user->role === 'superadmin' || $user->role === 'yayasan' || $user->role === 'kepala_sekolah' || $user->role === 'operator') {
            return true;
        }
    
        // Extract the record ID from the nested structure
        $record = $parameters['record'] ?? null;
    
        if (is_array($record)) {
            // Extract the first element if it's nested
            $record = reset($record);
        }
    
        // Ensure we have a valid News model instance
        if ($record instanceof \App\Models\News) {
            // Allow access if the user's branch_id matches the news' branch_id
            return $user->branch_id === $record->branch_id;
        }
    
        // Default: Deny access
        return false;
    }
    
    
    

}
