@if($errors->any())
    <br>
        <ul class="">
            @foreach($errors->all() as $error)
                <li class="">{{$error}}</li>
            @endforeach
        </ul>
@endif
