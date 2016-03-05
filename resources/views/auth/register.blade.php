<!-- resources/views/auth/register.blade.php -->
@if (session('status'))
    <div class="alert-message error">
        {{ session('status') }}
    </div>
@endif
@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="page-content">
                @include('errors.list')
            </div>
        </div>
    </div>
@endif
{!! Form::open(['action'=>'Auth\AuthController@getRegister']) !!}
    {!! csrf_field() !!}

    {!! Form::label('shop_name','Shop Name:') !!}
    {!! Form::text('shop_name',null) !!}

    {!! Form::label('user_name','User Name:') !!}
    {!! Form::text('user_name',null) !!}

    {!! Form::label('categories','Category') !!}
    {!! Form::select('categories[]',$categories,null,['class'=>'required-item','id'=>'tag_list','aria-required'=>'true','multiple']) !!}

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

    {!! Form::label('premium_shop','Premium Shop') !!}
    {!! Form::checkbox('premium_shop',null) !!}

    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null) !!}

    {!! Form::label('password','Password') !!}
    {!! Form::password('password',null) !!}

    {!! Form::label('password_confirmation','Confirm Password') !!}
    {!! Form::password('password_confirmation',null) !!}
    <div>
        <button type="submit">Register</button>
    </div>
{!! Form::close() !!}