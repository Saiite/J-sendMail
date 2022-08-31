


<div class="row">
    <title>j-SENDMAIL</title>
    <div class="col-12 col-xl-12">
        
        <div class="card card-body border-0 shadow mb-4">
            <div class="col-lg- col-sm-5">
        
    <form wire:submit.prevent=" mount" action="#" method="POST"> 
        
        <div class="form-group mt-4 mb-4">
           
                 <!-- Form -->
                 <div class="mb-4">
                    <label for="poste_libele">Nom</label>
                    <input wire:model="state.first_name" id="first_name" type="first_name" class="form-control" placeholder="njutapmvoui" autofocus required value="">
                         <small id="poste_libele" class="form-text text-muted"></small>
    
                             </div>
            @error('first_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
        
         <!-- Form -->
    
         <div class="mb-4">
            <label for="emeteur_noms">prénom</label>
            
            <input wire:model="state.last_name" id="last_name" type="last_name" class="form-control" placeholder="abdou" autofocus required>
                 <small id="" class="form-text text-muted"></small>
                     </div>
       
       
            @error('last_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
          
         <!-- Form -->
         <div class="col-lg- col-sm-5">
         <div class="mb-4">
            <label for="emeteur_noms">E-mail</label>
            <input wire:model="state.email" id="email" type="email" class="form-control" placeholder="example@company.com" autofocus required>
                 <small id="" class="form-text text-muted"></small>
                     </div>
    
                    </div>
            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror 
        </div>
        <!-- End of Form -->
        <div class="form-group">
            <!-- Form -->
           
            <!-- End of Form -->
            <div class="card card-body border-0 shadow mb-4">
            
            <!-- End of Form -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="terms" required>
                <label class="form-check-label fw-normal mb-0" for="terms">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>
       <div>   
         <button class="btn btn-primary" type="submit"value="Ok"  wire:click.prevent= "update">enregistre</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Retour</button>
    </div>
    </form>
    </div>
    </div>
    </div>  