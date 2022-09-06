


<div class="row">
    <div class="col-12 col-xl-12">

        <div class="card card-body border-0 shadow mb-4">
            <div class="col-lg- col-sm-5">

    <form wire:submit.prevent=" mount" action="#" method="POST">

    <div class="form-group mt-4 mb-4">

             <!-- Form -->

             <div class="form-group mt-4 mb-4">
                <label for="first_name">first_name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3"><svg class="" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg></span>
                    <input wire:model="state.first_name" id="first_name" type="first_name" class="form-control" placeholder="njutapmvoui" autofocus required value="">
                </div>



        @error('first_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

     <!-- Form -->
     <div class="form-group mt-4 mb-4">


         <!-- Form -->

         <div class="mb-4">
            <label for="emeteur_noms">last_name</label>
            <input wire:model="state.last_name" id="last_name" type="last_name" class="form-control" placeholder="abdou" autofocus required>
                 <small id="" class="form-text text-muted"></small>
                     </div>


            @error('last_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

         <!-- Form -->
         <div class="col-lg- col-sm-5">
         <div class="mb-4">
            <label for="emeteur_noms">YOU EMAIL</label>
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
         <button class="btn btn-primary" type="submit"value="Ok"  wire:click.prevent= "update">envoyer</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
    </form>
    </div>
    </div>
    </div>
