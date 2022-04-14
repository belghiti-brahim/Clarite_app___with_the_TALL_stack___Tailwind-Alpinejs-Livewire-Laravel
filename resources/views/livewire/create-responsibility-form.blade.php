<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div>
                    <x-jet-label for="name" value="{{ __('Responsibility name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('A brief description') }}" />
                    <textarea id="description"
                        class="mt-1 w-full inline-flex items-center px-3 py-5 rounded-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm"
                        type="text" name="desctiption" :value="old('email')" wire:model="description" required> </textarea>
                </div>
                <div wire:model="color" x-data="{ color: '#37ace6ff' }" x-init="// Wire up to show the picker when clicking the 'Change' button.
                
                picker = new Picker($refs.button);
                
                
                picker.onDone = rawColor => {
                
                
                    color = rawColor.hex;
                
                
                    $dispatch('input', color)
                
                }" // Vanilla Picker will attach its own DOM inside
                    this element, so we need to // add `wire:ignore` to tell Livewire to skip DOM-diffing for it.
                    wire:ignore // Forward the any attributes added to the component tag like `wire:model=color`
                    >

                    <!-- Show the current color value with the backgound color set to the chosen color. -->

                    <span x-text="color" :style="`background: ${color}`"></span>

                    <!-- When this button is clicked, the color-picker dialogue is shown. -->

                    {{-- <button x-ref="button">Change</button> --}}
                           <button x-ref="button" 
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${color}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>

                </div>
                {{-- <div x-data="{
                    isOpen: false,
                    colors: ['#F87171', '#FB923C', '#FFEB3B', '#A3E635', '#4CAF50', '#2DD4BF', '#60A5FA', '#C084FC', '#F472B6'],
                    colorSelected: '#F87171'}" x-cloak>
                    <div class=" py-1 my-2">
                        <div class="mb-5">
                            <div class="flex items-center">
                                <div>
                                    <label for="colorSelected"
                                        class="my-2 block text-sm font-medium text-gray-700">{{ __('Choose a color for this responsibility') }}</label>
                                    <input id="colorSelected" type="text" placeholder="{{ __('Pick a color') }}"
                                        name="color"
                                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                        readonly x-model="colorSelected">
                                </div>
                                <div class="relative ml-3 mt-8">
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                        :style="`background: ${colorSelected}; color: white`">
                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="none"
                                                d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                            <path
                                                d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                        </svg>
                                    </button>

                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                            <div class="flex flex-wrap -mx-2">
                                                <template x-for="(color, index) in colors" :key="index">
                                                    <div class="px-2">
                                                        <template x-if="colorSelected === color">
                                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                            </div>
                                                        </template>

                                                        <template x-if="colorSelected != color">
                                                            <div @click="colorSelected = color"
                                                                @keydown.enter="colorSelected = color" role="checkbox"
                                                                tabindex="0" :aria-checked="colorSelected"
                                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                                :style="`background: ${color};`"></div>
                                                        </template>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="btn ml-4">
                        {{ __('save') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </form>
</div>
