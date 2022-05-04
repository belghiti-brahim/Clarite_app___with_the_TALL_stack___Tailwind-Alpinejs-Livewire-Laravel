<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('todaysActions') }}" :active="request()->routeIs('todaysActions')">
            {{ __("Today's actions") }}
            <x-jet-nav-link href="{{ route('thisWeekActions') }}" :active="request()->routeIs('thisWeekActions')">
                {{ __('This week actions') }}
            </x-jet-nav-link>
        </x-jet-nav-link>
    </x-slot>

    <div class="ml-auto py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('show-this-week-actions')
        </div>
    </div>
</x-app-layout>
