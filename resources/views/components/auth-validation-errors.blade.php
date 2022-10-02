@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-bold text-red-700 text-center">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 text-base text-red-700 space-y-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
