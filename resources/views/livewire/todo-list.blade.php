<div>

    <h1 class="text-center mt-5 mb-5">Chapter <span class="text-danger">#2</span></h1>

    <div class="d-flex justify-content-center mb-5" >

        <div style="box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;padding:50px" >
    
            <form>

                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <h1>Create To-Do List</h1>
                <div class="mb-3" >
                    <label for="name" class="form-label">Todo<span class="text-danger">*</span></label>
                    <input wire:model="name" type="text" class="form-control" id="name" aria-describedby="To-List" placeholder="Todo...">
                    <div id="To-List" class="form-text">Organize tasks, set priorities, track progress, and achieve goals efficiently.</div>
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>


                <button wire:click.prevent="create" type="submit" class="btn btn-primary">Create +</button>
            </form>

            <div>

                <div>
                    <input wire:model.live.debounce.1ms="search" class="form-control" type="search" placeholder="search..." aria-label="Search">
                </div>

                <div>
                    @foreach($todos as $index => $todo) 
                        <div wire:key="{{$todo->id}}" class=" mt-2 mb-2 pt-2 pb-2 d-flex  ">
                            
                            <div>{{$index + 1}} - {{$todo->name}} : {{$todo->created_at->format('d M')}}</div>
                            <div class="ms-3 me-3" style="cursor: pointer;color:#F7D100;font-size:24px"><i class="bi bi-pencil-square"></i></div>
                            <div wire:click="delete({{$todo->id}})" class="ms-3 me-3" style="cursor: pointer;color:red;font-size:24px"><i class="bi bi-trash"></i></div>
                        
                        </div> 
                        @endforeach
                    <div>{{ $todos->links() }}</div>

                </div>

            </div>

        </div>


    </div>

</div>
