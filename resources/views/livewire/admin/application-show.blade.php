<div class="container">
    <h3>Adoption Application</h3>
    <x-applications.applicant-information-card :application="$application" class="mt-4 bg-light"/>
    <x-applications.homecheck-information-card :application="$application" :selectedVetter="$vetter" class="mt-4"/>
    <x-applications.application-information-card :application="$application" class="mt-4 bg-light"/>
</div>
