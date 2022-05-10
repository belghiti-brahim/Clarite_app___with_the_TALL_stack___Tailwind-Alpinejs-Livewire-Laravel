<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Actions') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('One and done') }}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                <livewire:create-action-form :project="$project" :action="null">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
