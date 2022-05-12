<div x-show="open" x-transition @click.outside="open = false">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="actionId" class="block text-sm font-medium text-gray-700">
                        {{ __('Action description') }} </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                            {{ __('Do') }}: </span>
                        <input type="text" name="description" id="actionId" wire:model="actionDescription"
                            class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                    </div>
                    <div class="errorMessage">
                        @error('actionDescription')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="project"
                    class="block text-sm font-medium text-gray-700">{{ __('Responsibilities') }}</label>
                <select id="project" name="project" wire:model="selectedResponsibility"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                    <option value="">{{ __('--Select a responsbility--') }}</option>
                    @foreach ($responsibilities as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            @if (!is_null($projects))
                <div class="col-span-6 sm:col-span-3">
                    <label for="project" class="block text-sm font-medium text-gray-700">{{ __('Projects') }}</label>
                    <select id="project" name="project" wire:model="slectedProject"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                        <option value="">{{ __('--Select a project--') }}</option>
                        @foreach ($projects as $item)
                            <option value="{{ $item->id }}">{{ $item->project_name }}</option>
                        @endforeach
                    </select>
                    <div class="errorMessage">
                        @error('slectedProject')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            @endif
            <div wire:loading>{{ __('Hold on...') }}</div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" wire:click="submit" class="btn">{{ __('save') }}</button>
        </div>
    </div>
</div>
