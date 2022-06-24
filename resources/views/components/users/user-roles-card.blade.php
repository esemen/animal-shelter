@props([
    'roles' => null,
    'user' => null,
])

<div class="card">
    <div class="card-body position-relative">
        <h2>
            {{ $user->fullname }}
        </h2>

        <hr class="my-3">

        <div class="row mt-2">
            <h5 class="col-12 mb-3">
                <i class="fa fa-key"></i> User Roles
            </h5>

            <form method="post" class="d-block w-100" action="{{ route('roles.update', ['user' => $user]) }}">
                @csrf
                @method('PATCH')
                @foreach($roles as $role)
                    <div class="form-checkbox-custom">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="roles[]"
                                   {{ $user->hasRole($role) ? 'checked':null }}
                                   type="checkbox" value="{{ $role->name }}" id="role.{{ $role->id }}">
                            <label class="form-check-label"
                                   for="role.{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    </div>
                @endforeach

                <div class="col text-center mt-4">
                    <span></span>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Apply</button>
                    <a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fa fa-undo"></i> Return</i> </a>
                </div>
            </form>
        </div>
    </div>
</div>
