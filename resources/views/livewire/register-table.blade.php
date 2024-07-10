<div>

    <h1>{{$username}}</h1>
   

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <!-- <th scope="col">image</th> -->
            </tr>
        </thead>
        <tbody>
            
   
            @foreach($registerForms as $registerForm)
                <tr>
                    <th scope="row">{{$registerForm->id}}</th>
                    <td>{{$registerForm->name}}</td>
                    <td>{{$registerForm->email}}</td>
                    <!-- <td><img src="{{ Storage::url($registerForm->image) }}"  widht="100" height="100"></td> -->
            
                </tr>
            @endforeach


        </tbody>
    </table>

</div>