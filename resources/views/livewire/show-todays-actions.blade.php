<div>
    <div>
        <div class="flex flex-col gap-3">
            <h1 class="hierarchyl1">{{ $today }}</h1>
            <div x-data="{ open: false }">
                <button class="btn mb-5"
                    x-on:click="open = ! open">{{ __('Add a last minute action for today') }}</button>

                <div x-show="open">
                    @livewire('create-last-minute-action')
                </div>
                <button
                    class="bg-lime-400 hover:bg-lime-500 text-white font-bold text-base py-2 px-4 rounded mt-5">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="col-start-1 flex flex-col gap-y-4">
            <h3 class="text-xl">{{ __('To do') }}</h3>
            @forelse ($actions as $action)
                @if ($action->context_id == 1)
                    <div id="action{{ $action->id }}"
                        style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <a href="">
                                <p>{{ $action->description }}</p>
                            </a>
                            <a href="{{ route('showProject', $action->project) }}">
                                <p style="color:{{ $action->project->responsibility->color }};"
                                    class="py-1 w-full text-sm rounded outline-none">
                                    #{{ $action->project->project_name }}
                                    <p>
                            </a>
                        </div>
                        <div class="flex flex-row">
                            <button wire:click="startAction({{ $action->id }})" class="icon">
                                <x-icon imgPath="{{ asset('images/start.png') }}" />
                            </button>
                            <a href="{{ route('editAction', $action->id) }}">
                                <x-icon imgPath="{{ asset('images/edit.png') }}" />
                            </a>
                            <button wire:click="remove({{ $action->id }})" class="icon">
                                <x-icon imgPath="{{ asset('images/delete.png') }}" />
                            </button>
                        </div>
                    </div>
                @endif
            @empty
                <div
                    class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                    <p class="modelTitle">{{ __('you have no action') }}</p>
                </div>
            @endforelse
        </div>
        <div class="flex flex-col gap-y-4">
            <h3 class="text-xl">{{ __('Doing') }}</h3>
            @forelse ($actions as $action)
                @if ($action->context_id == 2)
                    <div id="action{{ $action->id }}"
                        style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <a href="">
                                <p>{{ $action->description }}</p>
                            </a>
                            <a href="{{ route('showProject', $action->project) }}">
                                <p style="color:{{ $action->project->responsibility->color }};"
                                    class="py-1 w-full text-sm rounded outline-none">
                                    #{{ $action->project->project_name }}
                                    <p>
                            </a>
                        </div>
                        <div class="flex flex-row">
                            <button wire:click="actionIsDone({{ $action->id }})" class="icon">
                                <x-icon imgPath="{{ asset('images/done.png') }}" />
                            </button>
                            <a href="{{ route('editAction', $action->id) }}">
                                <x-icon imgPath="{{ asset('images/edit.png') }}" />
                            </a>
                            <button wire:click="remove({{ $action->id }})" class="icon">
                                <x-icon imgPath="{{ asset('images/delete.png') }}" />
                            </button>
                        </div>
                    </div>
                @endif
            @empty
                <div
                    class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                    <p class="modelTitle">{{ __('you have no action') }}</p>
                </div>
            @endforelse
        </div>
        <div class="flex flex-col gap-y-4">
            <h3 class="text-xl">{{ __('Done') }}</h3>

            @forelse ($actions as $action)
                @if ($action->context_id == 3)
                    <div id="action{{ $action->id }}"
                        style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <a href="">
                                <p class="line-through">{{ $action->description }}</p>
                            </a>
                            <a href="{{ route('showProject', $action->project) }}">
                                <p style="color:{{ $action->project->responsibility->color }};"
                                    class="py-1 w-full text-sm rounded outline-none">
                                    #{{ $action->project->project_name }}
                                    <p>
                            </a>
                        </div>
                        <div class="flex flex-row">
                            <a href="{{ route('editAction', $action->id) }}">
                                <x-icon imgPath="{{ asset('images/edit.png') }}" />
                            </a>
                            <button wire:click="remove({{ $action->id }})" class="icon">
                                <x-icon imgPath="{{ asset('images/delete.png') }}" />
                            </button>
                        </div>
                    </div>
                @endif
            @empty
                <div
                    class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                    <p class="modelTitle">{{ __('you have no action') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
