<div>
    <!-- Form Login menggunakan Bootstrap -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                        @error('failed')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='login'>
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                @error('email')
                                    <x-error-message :message="$message" />
                                @enderror
                                <input type="email" class="form-control" wire:model='email' id="email"
                                    name="email">
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                @error('password')
                                    <x-error-message :message="$message" />
                                @enderror
                                <input type="password" class="form-control" wire:model='password' id="password"
                                    name="password">
                            </div>
                            <a href="{{ route('user.register') }}">belum register?</a>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
