<div class="w-50 p-5">
    <form>
        <label for="" class="text-dark fw-bold fst-italic">Search</label>
        <input type="text" class="form-control mt-2" wire:model.live="input" placeholder="Mau cari apa?">

        <x-tables.users :users="$result"/>
    </form>
</div>
