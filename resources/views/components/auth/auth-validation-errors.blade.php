@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="text-base text-red-800 space-y-2 font-semibold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
