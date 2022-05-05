<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createActionFromProject', $project->id) }}" :active="request()->routeIs('')">
            {{ __('Add a new action') }}
        </x-jet-nav-link>
    </x-slot>

    <main class="relative min-h-screen">
        <div
            class="px-10 pt-8 relative md:fixed md:w-2/5 md:min-h-screen lg:min-h-screen flex items-center justify-content">
            <div class="flex flex-col ">
                <h1 class="pageContentTitle">{{ __('To finish this project') }}:<i> {{ $project->project_name }}</i>.
                    {{ __('I perform these actions:') }}</h1>
                <p class="hidden md:block">
                    {{ __('The actions to be performed on a specific date and time.') }}
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @livewire('show-actions-of-a-project', ['project' => $project])
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
