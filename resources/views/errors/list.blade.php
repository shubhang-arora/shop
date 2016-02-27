@if($errors->any())
    <br>
    <div class="ul_list">
        <ul class="alert-message error">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
