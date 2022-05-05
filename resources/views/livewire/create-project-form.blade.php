     <form wire:submit.prevent="submit">
         @csrf
         <div class="shadow sm:rounded-md sm:overflow-hidden">
             <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                 @if ($errors->any())
                     <div class="bg-red-600 text-white">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
                 <div class="grid grid-cols-3 gap-6">
                     <div class="col-span-3 sm:col-span-2">
                         <label for="projectId"
                             class="block text-sm font-medium text-gray-700">{{ __("Project's name") }}</label>
                         <div class="mt-1 flex rounded-md shadow-sm">
                             <input type="text" name="name" id="projectId" wire:model="projectName"
                                 class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                         </div>
                     </div>
                 </div>

                 <div>
                     <label for="about"
                         class="block text-sm font-medium text-gray-700">{{ __('A brief description') }}</label>
                     <div class="mt-1">
                         <textarea id="about" name="description" rows="3"
                             class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                             placeholder="..." wire:model="projectDescription"></textarea>
                     </div>
                 </div>

                 <div class="col-span-6 sm:col-span-3">
                     <label for="color"
                         class="block text-sm font-medium text-gray-700">{{ __('Responsability') }}</label>
                     <select id="color" name="responsibility" autocomplete="color-name"
                         class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                         <option value={{ $responsibility->id }}>{{ $responsibility->name }}
                         </option>
                     </select>

                 </div>
                    <div class="col-span-6 sm:col-span-3">
                     <label for="project"
                         class="block text-sm font-medium text-gray-700">{{ __('This project belongs to this project') }}</label>
                     <select id="project" name="project" autocomplete="project-name" wire:model="parentProjectName"
                         class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                         {{-- <option selected>{{ __('Open this select menu') }}</option> --}}
                         <option value=null>{{ __('None') }}</option>
                         @forelse ($responsibility->projects as $projects)
                       
                             @if($project && $projects->id === $project->id)
                                 <option class="hidden" value={{ $projects->id }}>
                                     {{ $projects->project_name }}</option>
                             @elseif($projects->project_id != null)
                                <option class="hidden" value={{ $projects->id }}>
                                     {{ $projects->project_name }}</option>
                             @else
                                 @if ($projects->archive === 0)
                                     <option class="hidden" value={{ $projects->id }}>
                                         {{ $projects->project_name }}
                                     @else
                                     <option value={{ $projects->id }}>{{ $projects->project_name }}
                                     </option>
                                 @endif
                             @endif
                         @empty
                             <option>{{ __("you don't have any projects created.") }}</option>
                         @endforelse
                     </select>

                 </div>
             </div>
             <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                 <button type="submit" class="btn">{{__('save')}}</button>
                 @if ($project)
                     <a href="{{ route('dashboard') }}" class="btnDelete ml-4">
                         {{ __('cancel') }}
                     </a>
                 @endif
             </div>

         </div>
     </form>
