<div class="w-50 p-5">
    <form>
        <label for="">search</label>
        <input type="text" class="form-control mt-2" wire:model.live="input">

        <x-tables.users :users="$result"/>
    </form>
</div>
