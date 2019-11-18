{{--allert of success--}}
@if(session('msg'))
    <div class="alert alert-success mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('msg')}}
    </div>
@endif

{{--alert of error--}}
@if(session('error'))
    <div class="alert alert-danger m-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Warning !  </strong>{{session('error')}}
    </div>
@endif

@if($errors->any())

    <div class="alert alert-danger mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif
