<div>
    <!-- Form Login menggunakan Bootstrap -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form wire:sumbit.prevent='login'>
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" wire:model='email' id="email" name="email" required>
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" wire:model='password' id="password" name="password" required>
                            </div>
                            <a href="{{ route("user.register") }}">belum register?</a>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
