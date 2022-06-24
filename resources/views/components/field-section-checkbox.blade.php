@props([
    'label' => 'Field Label',
    'nolabel' => false,
    'checkbox' => ''
])

<x-field-section {{ $attributes->exceptProps(['label', 'nolabel']) }} nolabel>
    <div class="form-check p-0">

        @unless($nolabel)
            <label class="form-check-label ml-2 pl-2" for="{{ $checkbox }}">
                {{ $slot }}
                <div class="d-inline-block ml-3 pl-3">{{ $label }}</div>
            </label>
        @endunless
    </div>
</x-field-section>
