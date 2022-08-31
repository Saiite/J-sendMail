

<div>
    <title>j-SENDMAIL</title>
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
 
                <br>
                
                    
                 
                <form wire:submit.prevent=" mount" action="#" method="POST"> 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Nom</label>
                                <input wire:model="state.first_name" class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Prénom</label>
                                <input wire:model="state.last_name" class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input wire:model="state.email" class="form-control" id="email" type="email"
                                    placeholder="name@company.com" disabled>
                            </div>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div>   
                           
                           <button wire:click.prevent="cancel()" class="btn btn-danger">retour</button>
                       </div>
                       </form>
                         
                                </div>                     
<div>






 

           
              
         
       