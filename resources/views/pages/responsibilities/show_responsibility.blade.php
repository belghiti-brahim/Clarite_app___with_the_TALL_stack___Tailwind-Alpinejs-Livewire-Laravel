<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createprojectfromresponsibility', $responsibility->id) }}">
            <button type="button" class="addBtn"> {{ __('Start a new project') }}</button>
        </x-jet-nav-link>
    </x-slot>

    <main class="relative min-h-screen">
        <div
            class="px-10 pt-8 relative md:fixed md:w-2/5 md:min-h-screen lg:min-h-screen flex items-center justify-content">
            <div class="flex flex-col ">
                <h1 class="pageContentTitle">{{ __('As') }}: <i>{{ $responsibility->name }}</i>.
                    {{ __("I'm commited to this projects:") }}</h1>
                <p class="hidden md:block">
                    {{ __("A project is anything we want to do that requires more than one action step. So it's a mechanism to remember that when we've completed that first action step, there's still something to do.") }}
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- @livewire('show-projects' , ['responsibility' => $responsibility->id]) --}}
                <livewire:show-projects :responsibility="$responsibility" :archive='$res'>
            </div>
        </div>
        </div>
    </main>


</x-app-layout>
