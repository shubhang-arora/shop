<!-- resources/views/auth/register.blade.php -->

{!! Form::open(['action'=>'Auth\AuthController@getRegister']) !!}
    {!! csrf_field() !!}

    {!! Form::label('shop_name','Shop Name:') !!}
    {!! Form::text('shop_name',null) !!}

    {!! Form::label('user_name','User Name:') !!}
    {!! Form::text('user_name',null) !!}

    {!! Form::label('email','Email') !!}
    {!! Form::text('email',null) !!}

    {!! Form::label('location','Location') !!}
    {!! Form::text('location',null) !!}

    {!! Form::label('city','City') !!}
    {!! Form::text('city',null) !!}

    {!! Form::label('state','State') !!}
    {!! Form::text('state',null) !!}

    {!! Form::label('phone','Contact') !!}
    {!! Form::text('phone',null) !!}

    {!! Form::label('amount_paid','Amount Paid') !!}
    {!! Form::text('amount_paid',null) !!}

    {!! Form::label('premium_shop','Premium Shop') !!}
    {!! Form::checkbox('premium_shop',null) !!}

    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null) !!}

    {!! Form::label('admin_password','Admin Password') !!}
    {!! Form::password('admin_password',null) !!}
    <div>
        <button type="submit">Register</button>
    </div>
{!! Form::close() !!}