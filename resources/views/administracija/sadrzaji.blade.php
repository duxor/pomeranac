@extends('administracija.master')

@section('tekstovi')
    active
@endsection
@section($sadrzaj['slug'])
    active
@endsection

@section('content')
<div style="width: 100%">
        <h1>Sadržaj</h1>
        <hr/>
    <div class=" row">
        <div class="col-md-8"> 
            {!! Form::open(['url' => '/administracija/sadrzaj', 'class'=>'form-horizontal']) !!}
                {!! Form::hidden('id', $sadrzaj['id']) !!}
                <div class="form-group">
                    {!! Form::label('lnaslov','Naslov', ['class'=>'col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('naslov', $sadrzaj['naslov'],  ['placeholder'=>'Naslov', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('lsadrzaj','Sadrzaj', ['class'=>'col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::textarea('sadrzaj', $sadrzaj['sadrzaj'],  ['placeholder'=>'Sadrzaj', 'class' => 'form-control']) !!}
                    </div>
                </div>

                @if(isset($sadrzaj['x']))
                    <div class="form-group">
                        {!! Form::label('lx','X koordinata', ['class'=>'form-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('x',$sadrzaj['x'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ly','Y koordinata', ['class'=>'form-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('y',$sadrzaj['y'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ly','Y koordinata', ['class'=>'form-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!!Form::text('z',null,['class'=>'form-control','placeholder'=>'z','id'=>'z','readonly'=>'readonly'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lgrad','Grad', ['class'=>'form-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('grad',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ulica','Ulica i broj', ['class'=>'form-label col-sm-3']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('ulica',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                @endif

                <div class="form-group">
                    {!! Form::button('<span class="glyphicon glyphicon-floppy-disk"></span> Sačuvaj', ['class' => 'btn btn-primary btn-lg','type'=>'submit']) !!}
                </div>
            {!! Form::close() !!}
        </div>
         @if(isset($sadrzaj['x']))
            <div class="gllpLatlonPicker col-md-4" id="mapPick">
                <h4>Pomerite marker, ili kliknite na mapu.</h4>
                <div class="row">
                    <div class="col-sm-8">
                    {!!Form::text('adresa',null,['class'=>'form-control gllpSearchField','placeholder'=>'Unesite adresu, mesto'])!!}
                    </div>
                    <div class="col-sm-4">
                    {!!Form::button('<span class="glyphicon glyphicon-zoom-in"></span> Pretraži', ['class'=>'btn btn-sm btn-success gllpSearchButton','value'=>'search'])!!}
                    </div>
                </div><br/>
                <div class="gllpMap">Google Maps</div>
                <input id="lat"  type="hidden" class="gllpLatitude" value="43.83452678223684"/>
                <input id="lon" type="hidden" class="gllpLongitude" value="20.478515625"/>
                <input id="zoom" type="hidden" class="gllpZoom" value="7"/>
            </div>
        @endif


    </div>
</div>
@endsection
@section('body')
<script type="text/javascript">
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