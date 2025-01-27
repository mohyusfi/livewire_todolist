<div class="col-3">
    <div class="card-header">
        <h3 class="text-center">ADD TODO</h3>
    </div>
    <form wire:submit.prevent="addTodo">
        <input type="text" name="todo" id="todo" class="form-control">
        <button class="btn btn-primary mt-2 w-100">ADD</button>
    </form>
</div>
