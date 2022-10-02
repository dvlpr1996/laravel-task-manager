@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-900 bg-green-300 round p-3']) }}>
        {{ $status }}
    </div>
@endif
