@extends('masterBackEnd')
<?php use App\Sadrzaj; ?>
<?php use App\TipSadrzaja; ?>
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
       {!! Form::open(array('url' => '/administracija/dodaj-galeriju', 'id' => 'galerijaForma')) !!}
       {!! Form::text('naslov', Input::old('naslov'),  array('placeholder'=>'Naslov', 'class' => 'form-control form-group', 'id' => 'naslov', 'data-msg-required' => 'Unesite ime galerije!', 'data-rule-required' => 'true')) !!}
       {!! Form::text('slug', Input::old('naslov'),  array('placeholder'=>'Slug', 'class' => 'form-control form-group', 'id' => 'slug', 'data-msg-required' => 'Unesite slug!', 'data-rule-required' => 'true')) !!}
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
       <div class="form-group">
       {!! Form::select('sadrzaj', DB::table('sadrzaj')->where('tip_sadrzaja_id',5)->lists('naslov', 'slug'), null, ['class' => 'form-control', 'id' => 'galerijaSelect']) !!}
       </div>
       <form id="dragndrop" class="dropzone">
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
<div id="galerije" class="container">
<div class="row">
<?php
$tip_sadrzaja_id = TipSadrzaja::where('naziv', 'galerija')->first()->id;
$galerije = Sadrzaj::where('tip_sadrzaja_id', $tip_sadrzaja_id)->get();

foreach ($galerije as $galerija)
{
    $string = (strlen($galerija->sadrzaj) > 140) ? substr($galerija->sadrzaj,0,139).'...' : $galerija->sadrzaj;
    $slike = scandir(public_path() . '/slike/galerije/' . $galerija['slug']);
    if(isset($slike[2])){
    $slika = '/slike/galerije/'. $galerija['slug'] . '/' . $slike[2];
    }else{
    $slika = '/slike/galerije/'. $galerija['slug'] . '/';
    }
    echo "<div class='col-sm-6 col-md-4'>
          <div class='thumbnail'  style='height: 360px'>
                <img src='{$slika}' alt='nema slika' style='height: 150px'>
                <div class='caption'>
                  <h3>{$galerija->naslov}</h3>
                  <p>{$string}</p>
                  <p><a href='#' class='btn btn-success' role='button'>Uredi</a></p>
                </div>
          </div>
          </div>";
}
?>
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
        dictDefaultMessage: "Prevucite slike ovde da bi ste ih dodali u galerju",
        init: function() {
          this.on("sending", function(file, xhr, formData) {
            formData.append("galerija", $('#galerijaSelect').val());
          });
        }
        });
    $("#galerijaForma").validate();
    });

</script>
@stop