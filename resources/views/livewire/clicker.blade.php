<div>

    <h1 class="text-center mt-5 mb-5">Chapter <span class="text-danger">#1</span></h1>
    <div>Hello World ! From clicker Blade file - Livewire</div>

    <button wire:click="addCount" class="btn btn-success">add count</button>
    <h1>{{$count}}</h1>

    <h1>{{count($users)}}</h1>
    
    <div class="ms-5 w-50">
        @if(session('success'))
            <span class="text-success">{{session('success')}}</span>
        @endif
        <form wire:submit="createUser" action="">
            <input wire:model="name" class="form-control mt-2" type="text" placeholder="name" >
            @error('name') <span class="text-danger">{{$message}}</span> @enderror

            <input wire:model="email" class="form-control mt-2" type="text" placeholder="email">
            @error('email') <span class="text-danger">{{$message}}</span> @enderror

            <input wire:model="password" class="form-control mt-2" type="password" placeholder="password">
            @error('password') <span class="text-danger">{{$message}}</span> @enderror
            <br>

            <button type="submit" class="btn btn-success mt-2">create USer</button>
        </form>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach($usersPagination as $index => $user)
            {{$index + 1}} - {{$user->name}} <br>
            @endforeach
        </div>
        <div class="col-12 d-flex ">    
            {{ $usersPagination->links() }}
        </div>
    </div>
    

</div>
