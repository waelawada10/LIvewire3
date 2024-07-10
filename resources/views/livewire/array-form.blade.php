<div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<button wire:click="printTest()" class="btn btn-info">DD</button>
<button wire:click="addRow()" class="btn btn-success">Add Row</button>

{{-- @if (session('success'))
        <div  x-init="
            Swal.fire({
                title: 'Good job!',
                text: '{{ session('success') }}',
                icon: 'success'
            }).then(() => { showAlert = false; });
        ">
        </div>
    @endif --}}

    @if (session('success'))
        <div x-data="{ showAlert: true }" x-init="() => {
            successMessage('{{ addslashes(session('success')) }}');
            showAlert = false;
        }"></div>
    @endif

  @foreach($registerForms as $index => $registerForm)

  <div class="d-flex mt-3 mb-3">

    <div class="ps-3 pe-3 ">
        <input wire:model="registerForms.{{$index}}.name" type="text" placeholder="name" class="form-control ">
        @error('registerForms.' . $index . '.name')  <span class="text-danger">{{$index}} : {{$message}} </span>@enderror
    </div>

    <div class="ps-3 pe-3">
        <input wire:model="registerForms.{{$index}}.email" type="email" placeholder="email" class="form-control">
        @error('registerForms.'. $index .'.email') <span class="text-danger">{{$index}} : {{$message}}</span>@enderror
        
    </div>

    <div class="ps-3 pe-3">
        <input wire:model="registerForms.{{$index}}.password" type="password" placeholder="password" class="form-control">
        @error('registerForms.'. $index .'.password') <span class="text-danger">{{$index}} : {{$message}}</span>@enderror

    </div>

    <div class="ps-3 pe-3">
        <button wire:click="removeRow({{$index}})" class="btn btn-danger">Remove Row</button>
    </div>
  </div>
  @endforeach

  <button wire:click="create" class="btn btn-success">Create Form</button>

  <button class="sweetyClick btn btn-primary">show sweet alert </button>

  <script>

    function sweety(){
           Swal.fire({
        title: "Error",
        text: "You clicked the button!",
        icon: "error"
        });
    }

    function successMessage(message) {
        Swal.fire({
            title: 'Good job!',
            text: message,
            icon: 'success'
        });
    }

    const sweetyButtons = document.querySelectorAll(".sweetyClick");
    sweetyButtons.forEach(wael => {
        wael.addEventListener("click", sweety);
    });

    </script>

</div>
