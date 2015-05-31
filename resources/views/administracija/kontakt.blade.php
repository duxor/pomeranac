@extends('administracija.master')
@section('title')
Kontakt
@endsection
@section('content')
<h1>Kontakt</h1>
<hr/>
{!! Form::open(array('url' => 'ubaciurl')) !!}
{!! Form::text('email', Input::old('email'),  array('placeholder'=>'Email', 'class' => 'form-control form-group')) !!}
{!! Form::text('x_koordinata', Input::old('x_koordinata'),  array('placeholder'=>'x koordinata', 'class' => 'form-control form-group')) !!}
{!! Form::text('y_koordinata', Input::old('y_koordinata'),  array('placeholder'=>'y koordinata', 'class' => 'form-control form-group')) !!}
{!! Form::textarea('tekst', Input::old('tekst'),  array('placeholder'=>'Kontakt tekst', 'class' => 'form-control form-group')) !!}
{!! Form::submit('Pošalji', array('class' => 'btn btn-primary form-group')) !!}
{!! Form::close() !!}
</div>
@stop