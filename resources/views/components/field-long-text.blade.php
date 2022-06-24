@props([
    'label' => 'Field Label',
    'iconClass' => 'fa fa-file-text-o'
])

<div {{ $attributes->exceptProps(['label', 'iconClass'])->merge(['class' => 'row']) }}>
    <h5 class="col-12 mb-3">
        <i class="{{ $iconClass }}"></i> {{ $label }}
    </h5>
    <div class="col">
        {{ $slot }}
    </div>
</div>
