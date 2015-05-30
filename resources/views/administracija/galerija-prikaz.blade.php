@extends('masterBackEnd')
<?php use App\Sadrzaj; ?>
<?php use App\TipSadrzaja; ?>
@section('title')
Galerija
@endsection
@section('content')
<hr>
<div class="row">
<?php
$slike = scandir(public_path() . '/slike/galerije/' . $slug);
$i = 2;
if(!isset($slike[2])){echo "<h1>Nema slika u galeriji</h1>";}
for ($i = 2; $i <= count($slike); $i++)
{
    if(isset($slike[$i])){
    $slika = '/slike/galerije/'. $slug . '/' . $slike[$i];
    echo "<div class='col-sm-6 col-md-4'>
              <a href='#' class='thumbnail'  style='height: 210px'>
                    <img src='{$slika}' alt='nema slika' style='height: 200px'>
              </a>
              </div>";
    }
}
?>
</div>
<hr>

<form id="dragndrop" class="dropzone">
       <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
       </form>
<hr>
@endsection
@section('javascript')
<script>
$(document).ready(function (){
      $("#dragndrop").dropzone({
        url: "/administracija/galerija-fotografija",
        dictDefaultMessage: "Prevucite slike ovde da bi ste ih dodali u galerju",
        init: function() {
          this.on("sending", function(file, xhr, formData) {
            formData.append("galerija", "<?php echo $slug; ?>" );
          });
        },
        complete: function(){location.reload();}
        });
    $("#galerijaForma").validate();
    });

</script>
@stop