        @forelse ($projects as $project)
            @if ($project->archive === 1)
                <div id="project{{ $project->id }}" style="outline-style: solid;
                                outline-color: {{ $project->responsibility->color }};"
                    class="px-8 py-4 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                    <div class="flex flex-col gap-y-3">
                        <a class="h-full w-full" href="">
                            <p class="w-full hover:font-black modelTitle">{{ $project->name }} </p>
                        </a>
                        <div class="flex flex-row">
                            <a href="" class="w-6 h-6 hover:w-8 hover:h-8">
                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                            </a>
                            <a href=""
                                class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/inbox.png') }}"
                                    alt="deltebutton">
                            </a>
                            <a href=""
                                class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/delete.png') }}"
                                    alt="deltebutton">
                            </a>
                        </div>
                        @forelse($project->children as $subproject)
                            <div
                                class="px-6 py-1 bg-gray-200 shadow-xl sm:rounded-lg w-68 h-full flex flex-row items-start justify-around gap-4">
                                <a href="">
                                    <p class="hover:font-black">{{ $subproject->name }} </p>
                                </a>
                                <div class="flex flex-row">
                                    <a href=""
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/edit.png') }}" alt="editbutton">
                                    </a>
                            
                                    <a href=""
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                    </a>
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
                        <a class="h-full w-full" href="">
                            <p class="w-full hover:font-bold">{{ $project->name }} </p>
                        </a>
                        <div class="flex flex-row">
                            <a href="" class="w-6 h-6 hover:w-8 hover:h-8">
                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                            </a>
                            <a href=""
                                class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/inbox.png') }}"
                                    alt="deltebutton">
                            </a>
                            <a href=""
                                class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/delete.png') }}"
                                    alt="deltebutton">
                            </a>
                        
                        </div>
                        @forelse($project->children as $subproject)
                            <div
                                class="bg-gray-200 shadow-xl sm:rounded-lg w-68 h-full min flex flex-row items-start justify-around">
                                <a href="">
                                    <p class="hover:text-1xl font-meduim">{{ $subproject->name }} </p>
                                </a>
                                <div class="flex flex-row">
                                    <a href=""
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/edit.png') }}" alt="editbutton">
                                    </a>
                         
                                    <a href=""
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                    </a>
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
                <p class="modelTitle">tu n'as aucun projet</p>
            </div>
        @endforelse
        <div class="m-24">
            {{ $projects->links() }}
        </div>
