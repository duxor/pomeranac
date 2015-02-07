@extends('masterBackEnd')
@section('title')
Logovanje
@endsection
@section('content')
<div style="width: 70%">
<h1>Logovanje</h1>
<hr/>
{!! Form::open(array('url' => 'ubaciurl')) !!}
{!! Form::text('username', Input::old('username'),  array('placeholder'=>'Email ili korisničko ime', 'class' => 'form-control form-group')) !!}
{!! Form::password('password', array('placeholder'=>'Šifra', 'class' => 'form-control form-group')) !!}
{!! Form::submit('Uloguj se', array('class' => 'btn btn-primary form-group')) !!}
{!! Form::button('Resetuj šifru', array('class' => 'btn btn-warning form-group')) !!}
{!! Form::close() !!}
</div>
@stop