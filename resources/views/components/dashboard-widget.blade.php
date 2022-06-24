@props([
    'label' => ''
])

<div class="col-lg-4 mt-5">
    <div class="card bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $label }}</h5>
            {{ $slot }}
        </div>
    </div>
</div>
