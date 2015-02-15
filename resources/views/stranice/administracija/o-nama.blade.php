@extends('masterBackEnd')
@section('title')
O nama
@endsection
<?php use App\TipSadrzaja; ?>
<?php use App\Sadrzaj; ?>
@section('content')
<div style="width: 70%">
<h1>Sadržaj</h1>
<hr/>
{!! Form::model($sadrzaj, array('url' => 'administracija/o-nama')) !!}
{!! Form::text('naslov', null,  array('placeholder'=>'Naslov', 'class' => 'form-control form-group')) !!}
{!! Form::text('slug', $sadrzaj->slug,  array('placeholder'=>'Slug', 'class' => 'form-control form-group', 'readonly' => 'readonly' )) !!}
{!! Form::textarea('sadrzaj', null,  array('placeholder'=>'Sadrzaj', 'class' => 'form-control form-group')) !!}
<br/>
<div class="form-group">
{!! Form::select('tip_sadrzaja', TipSadrzaja::lists('naziv','id'), $sadrzaj->tip_sadrzaja_id) !!}
</div>
{!! Form::submit('Sačuvaj', array('class' => 'btn btn-primary form-group')) !!}
{!! Form::close() !!}
</div>
@endsection
@section('javascript')
<script type="text/javascript">
//$( "select").change(function() {
//  alert($(this).val());
//});
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
@stop