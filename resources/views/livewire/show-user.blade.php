<div class="w-75 p-5">
    <form>
        <label for="">search</label>
        <input type="text" class="form-control" wire:model.live="input">

        <x-tables.users :users="$result"/>
    </form>
</div>
