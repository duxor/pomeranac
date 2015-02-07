@extends('masterBackEnd')
@section('title')
Galerija
@endsection
@section('content')
<h1>Galerija</h1>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(array('url' => 'ubaciurl')) !!}
       {!! Form::text('naslov', Input::old('naslov'),  array('placeholder'=>'Naslov', 'class' => 'form-control form-group')) !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        {!! Form::submit('Dodaj', array('class' => 'btn btn-primary form-group')) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<hr/>
{!! Form::open(array('url' => 'ubaciurl')) !!}
{!! Form::button('Dodaj galeriju', array('class' => 'btn btn-primary form-group', 'data-toggle' => 'modal', 'data-target' => '#myModal')) !!}
{!! Form::close() !!}
@stop