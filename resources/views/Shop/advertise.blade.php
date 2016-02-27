

{!! Form::open() !!}
@include('errors.list')
{!! Form::label('shop_id','Select Shop') !!}
{!! Form::select('shop_id',$shops,null) !!}


{!! Form::label('title','Title') !!}
{!! Form::text('title',null) !!}

{!! Form::label('description','Description') !!}
{!! Form::textarea('description',null) !!}

{!! Form::label('money','Money taken') !!}
{!! Form::text('money',null) !!}

{!! Form::submit('Add Advertisement',['class'=>'button color small submit','name'=>'askQuestion']) !!}
{!! Form::close() !!}