<!-- resources/views/auth/register.blade.php -->

{!! Form::open(['action'=>'Auth\AuthController@getRegister']) !!}
    {!! csrf_field() !!}

    {!! Form::label('shop_name','Shop Name:') !!}
    {!! Form::text('shop_name',null) !!}

    {!! Form::label('user_name','User Name:') !!}
    {!! Form::text('user_name',null) !!}


    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>





    <div>
        <button type="submit">Register</button>
    </div>
{!! Form::close() !!}