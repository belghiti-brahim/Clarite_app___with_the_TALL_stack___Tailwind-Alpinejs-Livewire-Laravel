<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('projects') }}" :active="request()->routeIs('projects')">
            {{ __('Active') }}
            <x-jet-nav-link href="{{ route('achivedProjects') }}" :active="request()->routeIs('createresponsability')">
                {{ __('Archived') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="" :active="request()->routeIs('createresponsability')">
                {{ __('Start a new project') }}
            </x-jet-nav-link>
        </x-jet-nav-link>
    </x-slot>

    <div class="ml-auto py-5">
        <div id="projectCollection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- @livewire("show-projects") --}}
                     <livewire:show-projects  :archive='null'></livewire:show-projects>
            </div>
        </div>
    </div>
</x-app-layout>
