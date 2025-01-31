<div class="w-100 p-5" wire:poll.60s>
    <form>
        <label for="search" class="fw-bold fst-italic">Search Todo</label>
        <input type="text" name="search" id="search" class="form-control my-2" wire:model.live.debounce.500ms='input' placeholder="Cari todo anda">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Todo</th>
                <th>Upload At</th>
                <th>Update At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todolists as $todolist)
                <tr>
                    <td>{{ $todolist->id }}</td>
                    <td>{{ $todolist->todo }}</td>
                    <td>{{ $todolist->created_at->diffForHumans() }}</td>
                    <td>{{ $todolist->updated_at->diffForHumans() }}</td>
                    <td class="d-flex justify-content-around">
                        <button class="btn btn-danger"
                        wire:click="delete({{ $todolist->id }})"
                        wire:confirm='Are you sure to delete "{{ $todolist->todo }}" ?'
                        >delete</button>
                        <input type="checkbox"  value="{{ $todolist->id }}" wire:model.live="updateId" class="form-check-input ms-3">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $todolists->links('vendor.livewire.bootstrap', data: ['scrollTo' => false]) }}
    </div>
</div>
