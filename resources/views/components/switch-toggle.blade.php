<div x-data="{ state: {{ $state ? 'true' : 'false' }} }" class="flex items-center">
    <button 
        type="button"
        class="relative inline-flex items-center h-6 w-11 rounded-full transition-colors duration-200 focus:outline-none"
        :class="{ 'bg-blue-500': state, 'bg-gray-300': !state }"
        @click="state = !state; $wire.call('updateTableColumnState', '{{ $column->getName() }}', {{ $record->getKey() }}, state)"
    >
        <span 
            class="inline-block h-4 w-4 transform bg-white rounded-full shadow transition-transform duration-200"
            :class="{ 'translate-x-5': state, 'translate-x-1': !state }"
        ></span>
    </button>
</div>
