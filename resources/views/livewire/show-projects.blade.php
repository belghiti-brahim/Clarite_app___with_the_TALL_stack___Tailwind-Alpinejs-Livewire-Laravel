<div class="flex flex-col gap-8">
    <div>
        <label for="resonsibilityId" class="block text-sm font-medium text-gray-700">
            {{ __('Find a project') }} </label>
        <div class="mt-1 flex rounded-md shadow-sm">

            <input type="text" name="findproject" id="resonsibilityId" wire:model="search"
                class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded sm:text-sm border-gray-300"
                placeholder="">
        </div>
    </div>
    @if ($archive)
        @if ($archive === 'to test for and show responsibility projects')
            <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @else
                <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @endif
    @else
        <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @endif

    @forelse ($projects as $project)
        @if ($project->archive === 1)
            <div id="project{{ $project->id }}" style="outline-style: solid;
                                outline-color: {{ $project->responsibility->color }};"
                class="px-8 py-4 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                <div class="flex flex-col gap-y-3">
                    <a class="h-full w-full" href="{{ route('showProject', $project) }}">
                        <p class="w-full hover:font-black modelTitle">{{ $project->project_name }} </p>
                    </a>
                    <div class="flex flex-row">
                        <a href="{{ route('editProject', $project) }}">
                            <x-icon imgPath="{{ asset('images/edit.png') }}" />
                        </a>
                        <button wire:click="archiveProject({{ $project->id }})">
                            <x-icon imgPath="{{ asset('images/inbox.png') }}" />
                        </button>
                        <button wire:click="remove({{ $project->id }})">
                            <x-icon imgPath="{{ asset('images/delete.png') }}" />
                        </button>
                    </div>
                    @forelse($project->children as $subproject)
                        <div
                            class="px-4 py-1 bg-gray-200 shadow-xl sm:rounded-lg w-auto h-full flex flex-row items-start justify-around gap-4">
                            <a href="{{ route('showProject', $subproject) }}">
                                <p class="hover:font-black">{{ $subproject->project_name }} </p>
                            </a>
                            <div class="flex flex-row">
                                <a href="{{ route('editProject', $subproject) }}">
                                    <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                </a>
                                <button wire:click="remove({{ $subproject->id }})" class="icon">
                                    <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                </button>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        @else
            <div id="project{{ $project->id }}" style="outline-style: solid;
                                outline-color: {{ $project->responsibility->color }};"
                class="px-10 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                <div class="opacity-25 flex flex-col gap-y-3">
                    <a class="h-full w-full" href="{{ route('showProject', $project) }}">
                        <p class="w-full hover:font-bold">{{ $project->project_name }} </p>
                    </a>
                    <div class="flex flex-row">
                        <a href="{{ route('editProject', $project) }}">
                            <x-icon imgPath="{{ asset('images/edit.png') }}" />
                        </a>
                        <button wire:click="archiveProject({{ $project->id }})">
                            <x-icon imgPath="{{ asset('images/inbox.png') }}" />
                        </button>
                        <button wire:click="remove({{ $project->id }})">
                            <x-icon imgPath="{{ asset('images/delete.png') }}" />
                        </button>

                    </div>
                    @forelse($project->children as $subproject)
                        <div
                            class="bg-gray-200 shadow-xl sm:rounded-lg w-68 h-full min flex flex-row items-start justify-around">
                            <a href="{{ route('showProject', $subproject) }}">
                                <p class="hover:text-1xl font-meduim">{{ $subproject->project_name }} </p>
                            </a>
                            <div class="flex flex-row">
                                <a href="{{ route('editProject', $subproject) }}"
                                    class="w-6 h-6 hover:w-8 hover:h-8">
                                    <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                </a>
                                <button wire:click="remove({{ $subproject->id }})">
                                    <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                </button>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        @endif
    @empty
        <div
            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
            <p class="modelTitle">{{ __('you have no project') }}</p>
        </div>
    @endforelse
</div>
<div class="flex">
    {{ $projects->links() }}
</div>
</div>
