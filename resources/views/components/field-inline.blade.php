@props([
    'label' => 'Field Label',
    'fullWidth' => false,
    'titleWidth' => 3
])

<div {{ $attributes->exceptProps(['label']) }}>
    @if ($fullWidth || $titleWidth == 12)
        <div class="text-bold">
            {{ $label }}
        </div>
        <div>
            {{ $slot }}
        </div>
    @else
        <div class="row mb-3">
            <div class="col-md-{{ $titleWidth }} text-bold">
                {{ $label }}
            </div>
            <div class="col-md-{{ 12 - $titleWidth }}">
                {{ $slot }}
            </div>
        </div>
    @endif
</div>
