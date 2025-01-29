<div class="d-flex justify-content-around pt-3">
    <div class="col-6">
        <div class="d-flex justify-content-between align-items-center col-10 ms-5">
            <span class="ms-3 me-5">Logged as <cite class="fs-4 text-primary fw-bold">{{ Auth::user()->name }}</cite></span>
            <h6 class="ms-5 "><a class="fst-italic pointer-event" href="{{ route('logout') }}">Logout</a></h6>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <x-tables.todolist :todolists="$todolistss" />

        @livewire('show-user')

    </div>
    <div class="col-4" style="margin-top: 5em">
        <x-form-todo />
        <x-todo-update-form />
    </div>
</div>
