<div class="container">
    <x-applications.application-information-card :application="$application"/>
    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-undo"></i> Return to Home</a>
        <form method="post" action="{{ route('applications.approve', ['application' => $application]) }}" class="d-inline">
            @csrf
            @method('put')
            <button class="btn btn-success"><i class="fa fa-check"></i> Approve</button>
        </form>
        <form method="post" action="{{ route('applications.reject', ['application' => $application]) }}" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger"><i class="fa fa-close"></i> Reject</button>
        </form>
    </div>
</div>
