<div class="d-flex justify-content-around mt-5">
    <div class="col-6">
        {{-- @if (session('success')) --}}
            <div class="alert alert-success">Success update Todo</div>
        {{-- @endif --}}

        <x-tables.todolist />

        @livewire('show-user')

        <h2 class="ms-5"><a href="{{ route('logout') }}">Logout</a></h2>
    </div>
    <x-form-todo />

</div>
