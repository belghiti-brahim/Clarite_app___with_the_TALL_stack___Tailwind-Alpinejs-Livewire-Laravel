<div>
    <div class="flex flex-col items-center justify-center gap-6">
        @forelse ($responsibilities as $responsibility)
            <div style="outline-style: solid;
                            outline-color: {{ $responsibility->color }};"
                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full min-h-[6rem] flex flex-row items-center justify-between">
                <a href="{{ route('showresponsibility', $responsibility->id) }}">
                    <p class=' hover:font-black modelTitle'>
                        {{ $responsibility->name }}</p>
                </a>
                <div class="flex flex-row">
                    <a href="{{ route('editresponsibility', $responsibility) }}">
                        <x-icon imgPath="{{ asset('images/edit.png') }}" />
                    </a>
                    <button wire:click="removeResponsibility({{ $responsibility->id }})">
                        <x-icon imgPath="{{ asset('images/delete.png') }}" />
                    </button>
                </div>
            </div>
        @empty
            <div
                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                <p class="modelTitle">{{ __('you have no responsibility') }}</p>
            </div>
        @endforelse
    </div>
    <x-jet-dialog-modal wire:model="confirmingResponsibilityDeletion">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to this responsibility? Once your responsibility is deleted, all of its projects and actions will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingResponsibilityDeletion', false)">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3 btnDelete" wire:click="deleteResponsibility({{$confirmingResponsibilityDeletion}})">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
