<div>
    <div class="flex flex-col items-center justify-center gap-6">
        @forelse ($responsibilities as $responsibility)
            <div id="res{{ $responsibility->id }}" style="outline-style: solid;
                            outline-color: {{ $responsibility->color }};"
                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full min-h-[6rem] flex flex-row items-center justify-between">
                <a href="{{ route('showresponsibility', $responsibility->id) }}">
                    <p class=' hover:font-black modelTitle'>
                        {{ $responsibility->name }}</p>
                </a>
                <div class="flex flex-row">
                    <a href="{{ route('editresponsibility', $responsibility) }}"
                        class="icon">
                        <x-icon message="{{ asset('images/edit.png') }}" />
                    </a>
                    <button wire:click="remove({{ $responsibility->id }})" class="icon">
                        <x-icon message="{{ asset('images/delete.png') }}" />
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

    <script>
    </script>
</div>
