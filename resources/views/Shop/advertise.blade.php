

{!! Form::open() !!}
@include('errors.list')

{!! Form::label('title','Title') !!}
{!! Form::text('title',null) !!}

{!! Form::label('description','Description') !!}
{!! Form::textarea('description',null) !!}

{!! Form::submit('Add Advertisement',['class'=>'button color small submit','name'=>'askQuestion']) !!}
{!! Form::close() !!}