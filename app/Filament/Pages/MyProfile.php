<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'My Profile';

    protected static ?string $slug = 'my-profile';

    protected static ?string $title = 'Edit Profile';

    protected static ?int $navigationSort = 6;

    protected static string $view = 'filament.pages.my-profile'; // Set the correct Blade view

    public $name;
    public $email;
    public $password;

    public function mount(): void
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->unique('users', 'email', fn ($record) => $record->id !== Auth::id()),
            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->nullable()
                ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null),
        ];
    }

    public function save(): void
    {
        $user = Auth::user();

        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['nullable', 'min:8'],
        ]);

        $user->update(array_filter($data)); // Only update non-null values

        $this->notify('success', 'Profile updated successfully!');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true; // Ensure this page is available in the navigation
    }
}
