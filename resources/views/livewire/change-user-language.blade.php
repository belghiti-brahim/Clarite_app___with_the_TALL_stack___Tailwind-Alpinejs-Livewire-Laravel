<x-jet-form-section submit="changeLanguage">
    <x-slot name="title">
        {{ __('App Language') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Change the application language') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('select a language') }}" />
            <select id="userLanguage"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                wire:model.defer="userLanguage">
                <option value=null>{{ __('languages') }}
                <option value="en">{{__('English')}}</option>
                <option value="fr">{{__('French')}}</option>
            </select>
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
