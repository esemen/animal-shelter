@props([
    'application' => null,
])

<div {{ $attributes->exceptProps(['application'])->merge(['class' => 'card']) }}>
    <div class="card-body row">
        <div class="col-lg-6">
            <div class="ff-title">Applicant</div>
            <div class="ff-value">
                {{ $application->user->fullname }}
            </div>
            <div class="ff-title">Animal</div>
            <div class="ff-value">
                {{ $application->animal->name }} ({{ $application->animal->breed }})
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ff-title">Application Date</div>
            <div class="ff-value">
                {{ formatDate($application->created_at) }}
            </div>
            <div class="ff-title">Application Status</div>
            <div class="ff-value">
                {{ $application->status->name }}
            </div>
        </div>
        <div class="col-12">
            <div class="ff-title">Applicant Address</div>
            <div class="ff-value">
                {{ $application->user->fullAddress }}
            </div>
        </div>
    </div>
</div>
