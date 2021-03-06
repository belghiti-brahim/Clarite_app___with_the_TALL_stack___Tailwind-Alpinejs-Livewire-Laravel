<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('projects') }}" :active="request()->routeIs('projects')">
            {{ __('Active') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('achivedProjects') }}" :active="request()->routeIs('createresponsability')">
            {{ __('Archived') }}
        </x-jet-nav-link>
    </x-slot>
    <div class="ml-auto py-5">
        <div id="projectCollection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire("show-projects", ['archive' => $archive])
        </div>
    </div>
</x-app-layout>
