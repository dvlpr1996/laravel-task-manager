@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-bold text-red-900 text-center">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 text-sm text-red-900 space-y-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
