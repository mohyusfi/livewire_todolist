<div class="w-25 bg-body-secondary py-4 px-5 rounded-4">
    <div class="card-header text-center">
        <h4>register?</h4>
    </div>
    <form wire:submit.prevent="save">
        @csrf
        <!-- Input Name -->
        <div>
            <label for="name">Name:</label>
            @error('name')
                <x-error-message :message="$message" />
            @enderror
        </div>
        <input class="form-control" wire:model="name" type="text" id="name" name="name">

        <!-- Input Email -->
        <div class="mt-2">
            <label for="email">Email:</label>
            @error('email')
                <x-error-message :message="$message" />
            @enderror
            <input class="form-control" wire:model="email" type="email" id="email" name="email">
        </div>

        <!-- Input Password -->
        <div class="mt-2">
            <label for="password">Password:</label>
            @error('password')
                <x-error-message :message="$message" />
            @enderror
            <input class="form-control" wire:model="password" type="password" id="password" name="password">
        </div>

        <!-- Input Confirm Password -->
        <div class="mt-2">
            <label for="password_confirmation">Confirm Password:</label>
            @error('password_confirmation')
                <x-error-message :message="$message" />
            @enderror
            <input class="form-control" wire:model="password_confirmation" type="password" id="password_confirmation"
                name="password_confirmation">

        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-primary mt-2 px-3" type="submit">Submit</button>
            <a href="{{ route('login') }}" class="ms-2 float-end">already have account?</a>
        </div>
    </form>
</div>
