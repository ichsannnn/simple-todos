<div>
    <div class="d-flex justify-content-between align-items-baseline mb-2">
        <h2>Todos</h2>
        <a class="btn btn-primary" href="#">Create</a>
    </div>

    @if(session()->has('success'))
        <x-alert type="success" message="{{ session('success') }}"/>
    @endif

    <div class="card collapse-icon accordion-icon-rotate">
        <div class="card-content">
            <div class="card-body">
                <div class="accordion" id="cardAccordion">
                    @forelse($todos as $todo)
                        <div @class(['card', 'm-0', 'bg-secondary']) style="border-radius: 0; @if($loop->odd) --bs-bg-opacity: .1; @else --bs-bg-opacity: .3; @endif">
                            <div @class(['card-header', 'bg-secondary']) style="border-radius: 0; @if($loop->odd) --bs-bg-opacity: .1; @else --bs-bg-opacity: .3; @endif">
                                <input wire:click="setStatus({{ $todo->id }})" class="form-check-input me-1" type="checkbox" aria-label="{{ $todo->title }}" @checked($todo->is_complete)>
                                <span @class(['collapsed', 'collapse-title', 'text-decoration-line-through' => $todo->is_complete])
                                      id="heading{{ $todo->id }}"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#collapse{{ $todo->id }}"
                                      aria-expanded="false"
                                      aria-controls="collapse{{ $todo->id }}"
                                      role="button">{{ $todo->title }}</span>
                            </div>
                            <div id="collapse{{ $todo->id }}" class="collapse pt-1" aria-labelledby="heading{{ $todo->id }}" data-parent="#cardAccordion">
                                <div @class(['card-body', 'text-decoration-line-through' => $todo->is_complete])>
                                    {{ $todo->description }}
                                </div>
                                <div @class(['card-footer', 'border-0', 'text-end', 'bg-secondary']) @if($loop->odd) style="--bs-bg-opacity: .0;" @else style="--bs-bg-opacity: .0;"  @endif>
                                    <a class="btn btn-warning" href="#">Edit</a>
                                    <button type="button" class="btn btn-danger" wire:click="delete({{ $todo->id }})">Delete</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <span class="font-bold">Yeay! Nothing to do!</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
