<div>

    <title>register form</title>
    
    <link rel="stylesheet" href="css/register.css">
    
    <div class="register-photo">
        <h1 class="text-center mt-5 mb-5">Chapter <span class="text-danger">#3</span></h1>
        <h3 class="text-center mt-5 mb-5">Register Form</h3>
        <div class="form-container">
            
            <div class="image-holder" style="background-color: #F4476B;"></div>
            
            
            
            <form wire:submit="create" enctype="multipart/form-data">
                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <h2 class="text-center"><strong>Create</strong> an account.</h2>

                <div class="form-group">
                    <input wire:model="name" class="form-control" type="text" name="name" placeholder="Name">
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <input wire:model="email" class="form-control mt-2" type="email" name="email" placeholder="Email">
                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <input wire:model="password" class="form-control mt-2" type="password" name="password" placeholder="Password">
                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <input wire:model="image" class="form-control mt-2" type="file">
                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div>
                    @if($image)
                        <img class="rounded " src="{{ $image->temporaryUrl() }}" style="width:100px;height:100px">
                    @endif
                    <div wire:loading wire:target="image" class="text-success">Uploading...</div>
                </div>

                <div wire:loading.delay.longest><span class="text-success">Sending...</span></div>


                <!-- <div wire:loading.remove class="form-group"> -->
                <div wire:loading.attr="disabled" class="form-group">
                    <button wire:loading.class.remove="btn-primary" wire:loading.class="btn-success"  class="btn btn-primary btn-block" type="submit">
                        Create Form +
                    </button>
                </div>

            </form>
        </div>
        <button type="button" @click="$dispatch('wael')">reload</button>
    </div>


@livewire('register-table')


</html>

</div>