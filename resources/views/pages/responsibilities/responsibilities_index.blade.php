<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createresponsibility') }}" :active="request()->routeIs('createresponsability')">
            {{ __('Define a new responsibility') }}
        </x-jet-nav-link>
    </x-slot>

    <main class="relative min-h-screen">
        <div
            class="px-10 pt-8 relative md:fixed md:w-2/5 md:min-h-screen lg:min-h-screen flex items-center justify-content">
            <div class="flex flex-col ">
                <h1 class="pageContentTitle">{{ __('I am') }}</h1>
                <p class="hidden md:block">
                    {{ __('The different aspects of my work and personal life that I wish to dedicate my time in a balanced way, hoping to achieve good results in each of them.') }}
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @livewire('show-responbilities')
                
            </div>
        </div>
    </main>

</x-app-layout>
