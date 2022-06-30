<!-- resources/views/livewire/user-form.blade.php -->
<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="first_name">first_name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" wire:model="first_name">
            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div>
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="last_name">last_name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" wire:model="last_name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="email" name="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" wire:model="age">
            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" wire:model="address">
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
