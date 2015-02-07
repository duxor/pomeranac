@extends('masterBackEnd')
@section('title')
O nama
@endsection
<?php use App\TipSadrzaja; ?>
@section('content')
<div style="width: 70%">
<h1>Sadržaj</h1>
<hr/>
{!! Form::open(array('url' => 'ubaciurl')) !!}
{!! Form::text('naslov', Input::old('naslov'),  array('placeholder'=>'Naslov', 'class' => 'form-control form-group')) !!}
{!! Form::text('slug', Input::old('slug'),  array('placeholder'=>'Slug', 'class' => 'form-control form-group')) !!}
{!! Form::textarea('sadrzaj', Input::old('sadrzaj'),  array('placeholder'=>'Sadrzaj', 'class' => 'form-control form-group')) !!}
<div class="form-group">
{!! Form::select('tip_sadrzaja', TipSadrzaja::lists('naziv','id')) !!}
</div>
{!! Form::submit('Sačuvaj', array('class' => 'btn btn-primary form-group')) !!}
{!! Form::close() !!}
</div>
@stop