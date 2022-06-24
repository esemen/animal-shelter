@props([
    'label' => 'Field Label',
    'nolabel' => false,
    'nomessage' => false,
    'field' => null,
])

<div {{ $attributes->exceptProps(['label'])->merge(['class' => 'cell-xs-12'])->merge(['class' => ($field && $errors->hasAny($field)) ? 'is-invalid' : null]) }}>
    <div class="form-group">
        @unless($nolabel)
            <label class="form-label-outside font-weight-bold">{{ $label }}</label>
        @endunless
        {{ $slot }}
        @if($field && !$nomessage)
            @foreach(collect($field) as $singleItem)
                @error($singleItem)
                <div class="text-danger pl-2">{{ $message }}</div>
                @enderror
            @endforeach
        @endif
    </div>
</div>
