
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card card-body border-0 shadow mb-4">
    <div class="btn-toolbar mb-2 mb-md-0">  
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
 
         <!-- Form -->
            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
        <div class="form-group mb-4">
            <label for="password">Your Password</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon4"><svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg></span>
                <input wire:model.lazy="password" type="password" placeholder="Password" class="form-control" id="password" required>
            </div>  
            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

  
        <div class="mb-3">
            <a href="" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                To add
            </a> <label class="my-1 me-2" for="user_id">postes</label>
            <select class="form-select" wire:model="poste_id" id="poste_id" aria-label="Default select example">
                <option selected>Open this select postes</option>
             @foreach ($dest as $value)
                <option value="{{$value->id}}">{{$value->poste_libele}}</option>
              @endforeach
            </select>
            @error('poste_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
         <!-- End of Form -->
         @if($mailSentAlert)
         <div class="alert alert-success" role="alert">
             An email containing the password reset link has been sent.
         </div>

         
     @endif
     @if($showDemoNotification)
         <div class="alert alert-danger" role="alert">
             You cannot do that in the demo version.
         </div>
     @endif
    <button wire:click.prevent="store({{  $value->id }})" class="btn btn-success">Save</button>
    
    <a href="http://127.0.0.1:8000/users" class="button" style="color: red">Cancel</a>
     
    @error('email') <div class="valid-feedback"> {{ $message }} </div> @enderror 

    
</form>
</div>
</div>