      <div class="py-12 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-6 xl:grid-cols-6">
          <div class="sm:px-6 lg:px-8 flex flex-col gap-4">
              <h1 class="hierarchyl3">{{ __('Monday') }}</h1>
              <div class="grid grid-col-1 gap-4">
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                      @forelse ($mondayactions as $action)
                          @if ($action->context_id == 1)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('Done') }}</h3>
                      @forelse ($mondayactions as $action)
                          @if ($action->context_id == 3)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                  <div class="flex flex-col">
                                      <a href="" class="line-through">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
          <div class="sm:px-6 lg:px-8 flex flex-col gap-4">
              <h1 class="hierarchyl3">{{ __('Tuesday') }}</h1>
              <div class="grid grid-col-1 gap-4">
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                      @forelse ($tueasdayactions as $action)
                          @if ($action->context_id == 1)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('Done') }}</h3>

                      @forelse ($tueasdayactions as $action)
                          @if ($action->context_id == 3)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                  <div class="flex flex-col">
                                      <a href="" class="line-through">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
          <div class="sm:px-6 lg:px-8 flex flex-col gap-4">
              <h1 class="hierarchyl3">{{ __('Wednesday') }}</h1>
              <div class="grid grid-col-1 gap-14">
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                      @forelse ($wednesdayactions as $action)
                          @if ($action->context_id == 1)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('Done') }}</h3>
                      @forelse ($wednesdayactions as $action)
                          @if ($action->context_id == 3)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                  <div class="flex flex-col">
                                      <a href="" class="line-through">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
          <div class="sm:px-6 lg:px-8 flex flex-col gap-4">
              <h1 class="hierarchyl3">{{ __('Thursday') }}</h1>
              <div class="grid grid-col-1 gap-14">
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                      @forelse ($thursdayactions as $action)
                          @if ($action->context_id == 1)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('Done') }}</h3>

                      @forelse ($thursdayactions as $action)
                          @if ($action->context_id == 3)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                  <div class="flex flex-col">
                                      <a href="" class="line-through">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
          <div id="collectionv" class="sm:px-6 lg:px-8 flex flex-col gap-4">
              <h1 class="hierarchyl3">{{ __('Friday') }}</h1>
              <div class="grid grid-col-1 gap-14">
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                      @forelse ($fridayactions as $action)
                          @if ($action->context_id == 1)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
                  <div class="flex flex-col gap-y-4">
                      <h3 class="text-base font-semibold">{{ __('Done') }}</h3>
                      @forelse ($fridayactions as $action)
                          @if ($action->context_id == 3)
                              <div id="action{{ $action->id }}"
                                  style="outline-style: solid;
                                        outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                  class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                  <div class="flex flex-col">
                                      <a href="" class="line-through">
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
                                      <a href="{{ route('editAction', $action->id) }}">
                                          <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                      </a>
                                      <button wire:click="removeAction({{ $action->id }})" class="icon">
                                          <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                      </button>
                                  </div>
                              </div>
                          @endif
                      @empty
                          <div
                              class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                              <p class="text-sm">{{ __('you have no action') }}</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>
          <div class="flex flex-col gap-8">
              <div id="collections" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                  <h1 class="hierarchyl3">{{ __('Saturday') }}</h1>
                  <div class="grid grid-col-1 gap-4">
                      <div class="flex flex-col gap-y-4">
                          <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                          @forelse ($saturdayactions as $action)
                              @if ($action->context_id == 1)
                                  <div id="action{{ $action->id }}"
                                      style="outline-style: solid;
                                            outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                      class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                          <a href="{{ route('editAction', $action->id) }}">
                                              <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                          </a>
                                          <button wire:click="removeAction({{ $action->id }})"
                                              class="icon">
                                              <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                          </button>
                                      </div>
                                  </div>
                              @endif
                          @empty
                              <div
                                  class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                                  <p class="text-sm">{{ __('you have no action') }}</p>
                              </div>
                          @endforelse
                      </div>
                      <div class="flex flex-col gap-y-4">
                          <h3 class="text-base font-semibold">{{ __('Done') }}</h3>
                          @forelse ($saturdayactions as $action)
                              @if ($action->context_id == 3)
                                  <div id="action{{ $action->id }}"
                                      style="outline-style: solid;
                                            outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                      class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                      <div class="flex flex-col">
                                          <a href="" class="line-through">
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
                                          <a href="{{ route('editAction', $action->id) }}">
                                              <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                          </a>
                                          <button wire:click="removeAction({{ $action->id }})"
                                              class="icon">
                                              <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                          </button>
                                      </div>
                                  </div>
                              @endif
                          @empty
                              <div
                                  class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                                  <p class="text-sm">{{ __('you have no action') }}</p>
                              </div>
                          @endforelse
                      </div>
                  </div>
              </div>
              <div id="collectiond" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                  <h1 class="hierarchyl3">{{ __('Sunday') }}</h1>
                  <div class="grid grid-col-1 gap-4">
                      <div class="flex flex-col gap-y-4">
                          <h3 class="text-base font-semibold">{{ __('To do') }}</h3>
                          @forelse ($sundayactions as $action)
                              @if ($action->context_id == 1)
                                  <div id="action{{ $action->id }}"
                                      style="outline-style: solid;
                                            outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                      class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
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
                                          <a href="{{ route('editAction', $action->id) }}">
                                              <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                          </a>
                                          <button wire:click="removeAction({{ $action->id }})"
                                              class="icon">
                                              <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                          </button>
                                      </div>
                                  </div>
                              @endif
                          @empty
                              <div
                                  class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                                  <p class="text-sm">{{ __('you have no action') }}</p>
                              </div>
                          @endforelse
                      </div>
                      <div class="flex flex-col gap-y-4">
                          <h3 class="text-base font-semibold">{{ __('Done') }}</h3>
                          @forelse ($sundayactions as $action)
                              @if ($action->context_id == 3)
                                  <div id="action{{ $action->id }}"
                                      style="outline-style: solid;
                                            outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                      class="px-6 py-1 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between gap-2">
                                      <div class="flex flex-col">
                                          <a href="" class="line-through">
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
                                          <a href="{{ route('editAction', $action->id) }}">
                                              <x-icon imgPath="{{ asset('images/edit.png') }}" />
                                          </a>
                                          <button wire:click="removeAction({{ $action->id }})"
                                              class="icon">
                                              <x-icon imgPath="{{ asset('images/delete.png') }}" />
                                          </button>
                                      </div>
                                  </div>
                              @endif
                          @empty
                              <div
                                  class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                                  <p class="text-sm">{{ __('you have no action') }}</p>
                              </div>
                          @endforelse
                      </div>
                  </div>
              </div>
          </div>
          <x-jet-dialog-modal wire:model="confirmingActionDeletion">
              <x-slot name="title">
                  {{ __('Delete Account') }}
              </x-slot>

              <x-slot name="content">
                  {{ __('Are you sure you want to this action? Once your action is deleted, it will be permanently deleted.') }}
              </x-slot>

              <x-slot name="footer">
                  <x-jet-secondary-button wire:click="$set('confirmingActionDeletion', false)">
                      {{ __('Cancel') }}
                  </x-jet-secondary-button>

                  <x-jet-danger-button class="ml-3 btnDelete"
                      wire:click="deleteAction({{ $confirmingActionDeletion }})">
                      {{ __('Delete') }}
                  </x-jet-danger-button>
              </x-slot>
          </x-jet-dialog-modal>
      </div>
