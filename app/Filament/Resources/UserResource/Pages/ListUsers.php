<?php

namespace App\Filament\Resources\UserResource\Pages;

use Closure;
use Filament\Actions;
use Filament\Tables\Table;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),
        ];
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()->recordUrl(null);
    }
    
}
