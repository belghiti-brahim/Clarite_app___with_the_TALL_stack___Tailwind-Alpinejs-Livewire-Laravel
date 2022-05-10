 <form wire:submit.prevent="submit">
     @csrf
     <div class="shadow sm:rounded-md sm:overflow-hidden">
         <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
             @if ($errors->any())
                 <div class="bg-red-600 text-white">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>* {{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
             <div class="grid grid-cols-3 gap-6">
                 <div class="col-span-3 sm:col-span-2">
                     <label for="actionId" class="block text-sm font-medium text-gray-700">{{__('Action description')}}
                     </label>
                     <div class="mt-1 flex rounded-md shadow-sm">
                         <span
                             class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                             {{ __('Do') }}: </span>
                         <input type="text" name="description" id="actionId" wire:model="actionDescription"
                             class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                     </div>
                 </div>
             </div>

             <div>
                 <label for="about" class="block text-sm font-medium text-gray-700"> {{ __('Definition of done') }}
                 </label>
                 <div class="mt-1">
                     <textarea id="about" name="defintionOfDone" rows="3"
                         class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                         placeholder="..." wire:model="definitonOfDone"></textarea>
                 </div>
             </div>

             <div class="col-span-6 sm:col-span-3">
                 <label for="project" class="block text-sm font-medium text-gray-700">{{ __('Project') }}</label>
                 <select id="project" name="project" wire:model="projectName"
                     class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                     @if ($action)
                         <option value={{ $projectName->id }}>{{ $projectName->project_name }}</option>
                     @else
                         <option value={{ $project->id }}>{{ $project->project_name }}</option>
                     @endif
                 </select>
             </div>

             <div class="col-span-6 sm:col-span-3">
                 <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                 <select id="status" name="status" autocomplete="status" wire:model="status"
                     class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                     <option value=1>{{ __('To do') }}</option>
                     <option value=2>{{ __('Doing') }}</option>
                     <option value=3>{{ __('Done') }}</option>
                 </select>
             </div>
             <div x-data x-init="flatpickr($refs.datetimewidget, { wrap: true, enableTime: false, dateFormat: 'Y-m-d', locale: 'en' });" x-ref="datetimewidget"
                 class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5">
                 <label for="datetime"
                     class="flex-grow  block font-medium text-sm text-gray-700 mb-1">{{ __("Action's deadline") }}</label>
                 <div class="flex align-middle align-content-center">
                     <input x-ref="datetime" type="text" id="datetime" data-input name="deadline" wire:model="deadline"
                         placeholder="Select.."
                         class="block w-full px-2 border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-l-md shadow-sm">
                     <a class="h-11 w-20 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r flex justify-center items-center"
                         title="clear" data-clear>
                         <p>{{ __('clear') }}</p>
                     </a>
                 </div>
             </div>
         </div>
         <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
             <button type="submit" class="btn">{{ __('save') }}</button>
         </div>
     </div>
 </form>
