<div class="col-3">
    <div class="card card-header">
        <h3 class="text-center">ADD TODO</h3>
    </div>
    <form wire:submit.prevent="addTodo" class="bg-body-secondary p-3 rounded-bottom-3">
        <input type="text" name="todo" id="todo" class="form-control" wire:model='todo'>
        <button class="btn btn-primary mt-2 w-100">ADD</button>
    </form>
</div>
