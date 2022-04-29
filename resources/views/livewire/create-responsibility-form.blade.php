<div>
    <form wire:submit.prevent="submit">
        @csrf
        @if ($errors->any())
            <div class="bg-red-600 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div>
                    <x-jet-label for="name" value="{{ __('Responsibility name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" name="name"
                         autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('A brief description') }}" />
                    <textarea id="description"
                        class="mt-1 w-full inline-flex items-center px-3 py-5 rounded-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm"
                        type="text" name="desctiption"  wire:model="description"
                        required> </textarea>
                </div>
                <x-jet-label for="color" value="{{ __('Choose a color for this responsibility') }}" />

                <div wire:model="color" x-data="{ color: '#37ace6ff' }" x-init="picker = new Picker($refs.button);
                picker.onDone = rawColor => {
                    color = rawColor.hex;
                    $dispatch('input', color)
                }" class="flex gap-x-2">
                    @if ($color)
                        <span class="rounded-md p-3" style="background-color:{{ $color }}"> color </span>
                        <button x-ref="button"
                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: {{ $color }}; color: white`">
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none"
                                    d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                <path
                                    d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                            </svg>
                        </button>
                    @else
                        <span class="rounded-md p-3" x-text="color" :style="`background: ${color}`"></span>
                        <button x-ref="button"
                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: ${color}; color: white`">
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none"
                                    d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                <path
                                    d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                            </svg>
                        </button>
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="btn ml-4">
                        {{ __('save') }}
                    </x-jet-button>
                    @if ($color)
                        <a href="{{ route('dashboard') }}" class="btnDelete ml-4">
                            {{ __('cancel') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
