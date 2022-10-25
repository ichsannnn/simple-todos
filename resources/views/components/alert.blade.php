@props([
    'type' => 'success',
    'header' => null,
    'errors' => [],
    'message' => null
])

<div class="alert alert-{{ $type }} text-start" role="alert">
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
</div>
