<div class="col-12 mt-5">
    <div class="card card-header">
        <h3 class="text-center">UPDATE TODO</h3>
    </div>
    <form wire:submit.prevent="updateTodo" class="bg-body-secondary p-3 rounded-bottom-3" style="height: 10em">
        @error("updateId")
            <x-error-message :message="$message"/>
        @enderror
        <label for="newTodo">Todo :</label>
        <input type="text" name="newTodo" id="newTodo" class="form-control" wire:model='newTodo'>
        @error("newTodo")
            <x-error-message :message="$message"/>
        @enderror
        <button class="btn btn-primary mt-2 w-100">UPDATE</button>
    </form>
</div>
