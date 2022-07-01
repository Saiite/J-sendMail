<form>
    <form wire:submit.prevent="register" action="#" method="POST">
        <div class="form-group mt-4 mb-4">
            <label for="first_name">first_name</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3"><svg class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg></span>
                <input wire:model="first_name" id="first_name" type="first_name" class="form-control" placeholder="njutapmvoui" autofocus required>
            </div>
            @error('first_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
        
         <!-- Form -->
         <div class="form-group mt-4 mb-4">
            <label for="last_name">last_name</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3"><svg class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg></span>
                <input wire:model="last_name" id="last_name" type="last_name" class="form-control" placeholder="abdou" autofocus required>
            </div>
            @error('last_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
          
         <!-- Form -->

        <div class="form-group mt-4 mb-4">
            <label for="email">Your Email</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3"><svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg></span>
                <input wire:model="email" id="email" type="email" class="form-control" placeholder="example@company.com" autofocus required>
            </div>
            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>