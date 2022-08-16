<div>
    <form method="POST" wire:submit.prevent="update">
        <div class="mt-3">
        
       </div>
       <br>
       <br>
    <div class="row">
        <div class="col-12 col-xl-8">
            @if($showSavedAlert)
            <div class="alert alert-success" role="alert">
              
            </div>
            @endif
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">General information</h2>
                <br>
                <a class="dropdown-item" href="{{ route('profile',$this->user->id) }}"> <span class="fas fa-edit me-1"></span>Edit Profil</a>
                <br>
                <form wire:submit.prevent="save" action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">First Name</label>
                                <input wire:model="user.first_name" class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Last Name</label>
                                <input wire:model="user.last_name" class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model="user.email" class="form-control" id="email" type="email"
                                    placeholder="name@company.com" disabled>
                            </div>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                     
                        
                        <div class="col-md-6 mb-3">
                          
                            <div class="form-group">
                                <label for="email">Poste</label>
                                <input wire:model="postes.poste_libele" class="form-control" id="postes.poste_libele" type="postes.poste_libele"
                                    placeholder="" disabled>
                            </div>
                            @error('poste_libele') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                                             
                </form>
                @if($showDemoNotification)
                <div class="alert alert-info mt-2" role="alert">
                    You cannot do that in the demo version.
                </div>
                @endif
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">
                        <div wire:ignore.self class="profile-cover rounded-top"
                            data-background="../assets/img/profile-cover.jpg"></div>
                        <div class="card-body pb-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" wire:submit.prevent='create'>
                                        <div class="card-body">
                                            
                                            <div class="custom-file mt-3">
                                                <input type="file" wire:model='image' class="custom-file-input" id="customFile"  >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                
                                            </div>
                                            @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="" class="avatar rounded-circle">
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            
                                    
                                            <button type="submit" class="btn btn-primary">Save</button>
                                           
                                        </div>

                                    </form>  
                                    
                                  
                                   
                                </div>
                            </div>

                            
                            <h4 class="h3">
                                {{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name'}}
                           </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div>






 