<form>
    <div class="form-group">
        <input type="hidden" wire:model="user_id">
        <label for="userfirst_name">first_name</label>
        <input type="text" class="form-control" wire:model="first_name" id="userfirst_name" placeholder="Enter Name">
        @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="usermail">Email address</label>
        <input type="email" class="form-control" wire:model="email" id="usermail" placeholder="Enter Email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>