@props([
    'label' => 'Field Label',
    'nolabel' => false
])

<div {{ $attributes->exceptProps(['label']) }}>
    <div class="form-group">
        @unless($nolabel)
            <p class="form-label-outside">{{ $label }}</p>
        @endunless
        {{ $slot }}
    </div>
</div>
