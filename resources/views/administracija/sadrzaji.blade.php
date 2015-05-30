@extends('masterBackEnd')

@section('tekstovi')
    active
@endsection
@section($sadrzaj['slug'])
    active
@endsection

@section('content')
    <div style="width: 70%">
        <h1>Sadržaj</h1>
        <hr/>
        {!! Form::open(['url' => '/administracija/sadrzaj', 'class'=>'form-horizontal']) !!}
            {!! Form::hidden('id', $sadrzaj['id']) !!}
            <div class="form-group">
                {!! Form::label('lnaslov','Naslov', ['class'=>'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('naslov', $sadrzaj['naslov'],  ['placeholder'=>'Naslov', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('lsadrzaj','Sadrzaj', ['class'=>'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('sadrzaj', $sadrzaj['sadrzaj'],  ['placeholder'=>'Sadrzaj', 'class' => 'form-control']) !!}
                </div>
            </div>

            @if(isset($sadrzaj['x']))
                <div class="form-group">
                    {!! Form::label('lx','X koordinata', ['class'=>'form-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('x',$sadrzaj['x'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('ly','Y koordinata', ['class'=>'form-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('y',$sadrzaj['y'],['class'=>'form-control']) !!}
                    </div>
                </div>
            @endif

            <div class="form-group">
                {!! Form::button('<span class="glyphicon glyphicon-floppy-disk"></span> Sačuvaj', ['class' => 'btn btn-primary btn-lg','type'=>'submit']) !!}
            </div>
        {!! Form::close() !!}
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