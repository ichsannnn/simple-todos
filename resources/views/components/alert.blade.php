@props([
    'type' => 'success',
    'header' => null,
    'errors' => [],
    'message' => null
])

<div class="alert alert-{{ $type }} alert-dismissible fade show text-start" role="alert">
    @if($header)
        <h4 class="alert-heading">{{ $header }}</h4>
    @endif
    @if(count($errors) > 0)
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @else
        {{ $message }}
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
