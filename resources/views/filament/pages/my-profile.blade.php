<x-filament::page>
    {{ $this->form }}

    <div class="mt-4">
        <button type="submit" wire:click="save" class="px-4 py-2 bg-primary-600 text-white rounded hover:bg-primary-700">
            Save
        </button>
    </div>
</x-filament::page>
