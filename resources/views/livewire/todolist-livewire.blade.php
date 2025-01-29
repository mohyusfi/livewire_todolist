<div class="d-flex justify-content-around mt-5">
    <div class="col-6">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <x-tables.todolist :todolists="$todolistss" />

        {{-- @foreach ($todolistss as $todo)
            <h1>{{ $todo->todo }}</h1>
        @endforeach --}}

        @livewire('show-user')

        <h2 class="ms-5"><a href="{{ route('logout') }}">Logout</a></h2>
    </div>
    <div class="col-3">
        <x-form-todo />
        <x-todo-update-form />
    </div>
</div>
