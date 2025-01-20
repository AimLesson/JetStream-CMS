<?php

namespace App\Filament\Resources\PersonaliaResource\Pages;

use App\Filament\Resources\PersonaliaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonalia extends EditRecord
{
    protected static string $resource = PersonaliaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
