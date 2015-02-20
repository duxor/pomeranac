@extends('masterBackEnd')
<?php use App\Sadrzaj; ?>
@section('title')
Galerija
@endsection
@section('content')
<h1 xmlns="http://www.w3.org/1999/html">Galerija</h1>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Galerija</h4>
      </div>
      <div class="modal-body">
       {!! Form::open(array('url' => '/administracija/dodaj-galeriju')) !!}
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

<div class="modal fade" id="myModalFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Galerija</h4>
      </div>
      <div class="modal-body">
      <label>Odaberite galeriju: </label>
      <div class="form-group">

      </div>
       <form id="dragndrop" class="dropzone">
       {!! Form::select('sadrzaj', DB::table('sadrzaj')->where('tip_sadrzaja_id',4)->lists('naslov', 'id'), null, ['class' => 'form-control']) !!}
       <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
      </div>
    </div>
  </div>
</div>


<hr/>
{!! Form::open(array('url' => 'ubaciurl')) !!}
{!! Form::button('Dodaj galeriju', array('class' => 'btn btn-primary form-group', 'data-toggle' => 'modal', 'data-target' => '#myModal')) !!}
{!! Form::button('Dodaj fotografije u galeriju', array('class' => 'btn btn-primary form-group', 'data-toggle' => 'modal', 'data-target' => '#myModalFoto')) !!}
{!! Form::close() !!}

{{--{!! Form::open(array('url' => '/administracija/galerija-fotografija', 'class' => 'dropzone')) !!}--}}
{{--{!! Form::close() !!}--}}
<div id="dragndrop"></div>
@endsection
@section('javascript')
<script>
$(document).ready(function (){
    $("#dragndrop").dropzone({
        url: "/administracija/galerija-fotografija",
        dictDefaultMessage: "Prevucite slike ovde da bi ste ih dodali u galerju"
        });

        });
$(".nav a").on("click", function(){
           $(".nav").find(".active").removeClass("active");
           $(this).parent().addClass("active");
        });
</script>
@stop