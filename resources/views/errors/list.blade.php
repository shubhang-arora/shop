@if($errors->any())
    <div class="alert alert-danger">
        <div class="container-fluid">
            @foreach($errors->all() as $key=>$error)
                @unless($key==0)
                    <br>
                @endunless
                <div class="alert-icon">
                    <i class="material-icons">error_outline</i>
                    {{$error}}
                </div>
                @unless($key==count($errors->all()))
                    <br>
                @endunless
            @endforeach
        </div>
    </div>
@endif
