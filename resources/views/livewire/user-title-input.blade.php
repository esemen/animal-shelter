<div>
    <select name="title" wire:model="selectedTitle"
            class="form-control @error('title') is-invalid @enderror"
            required autofocus onchange='Title(this.value);'>
        <option value="">Select</option>
        <option value="Mr.">Mr.</option>
        <option value="Mrs.">Mrs.</option>
        <option value="Ms.">Ms.</option>
        <option value="Miss">Miss</option>
        <option value="Other">Other</option>
    </select>

    <input class="form-control {{ $selectedTitle <> 'Other' ? 'hidden' : null }}" type="text" name="title" id="title"
           wire:model="title"
           placeholder="Please enter your title"/>
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
