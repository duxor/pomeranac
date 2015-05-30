@extends('masterBackEnd')

@section('content')
    {!! Form::open(['url'=>'/administracija/galerija','class'=>'form-horizontal container']) !!}
        <div class="form-group">
            {!! Form::text('naslov',$podaci['naslov'],['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('slug',$podaci['slug'],['class'=>'form-control', 'readonly']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('sadrzaj',$podaci['sadrzaj'],['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::button('<span class="glyphicon glyphicon-floppy-disk"></span> Sačuvaj',['class'=>'btn btn-lg btn-primary','type'=>'submit']) !!}
        </div>
    {!! Form::close() !!}
    <a href="#" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#dodajFoto"><span class="glyphicon glyphicon-picture"></span> Dodaj fotografije</a>
    @if($podaci['slike'])
            <div class="row">
                    @foreach($podaci['slike'] as $slika)
                    <div class="col-xs-6 col-md-3">
                        {!! Form::open(['url'=>'/administracija/ukloni-sliku']) !!}
                            {!! Form::hidden('slika',$slika) !!}
                            {!! Form::button('<img src="/'.$slika.'">',['class'=>'thumbnail','data-html'=>'true','data-toggle'=>'popover','data-trigger'=>'focus','title'=>'Opcije','data-content'=>'<button class="btn btn-danger" type="submit">Ukloni</button>']) !!}
                        {!! Form::close() !!}
                    </div>
                    @endforeach
                    <script>$(document).ready(function(){$('.thumbnail').popover();});</script>
            </div>
    @else <p>Nije dodata ni jedna fotografija u ovu galeriju.</p>
    @endif


@endsection

@section('body')

    <div class="modal fade" id="dodajFoto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h2>Dodaj nove fotografije</h2>
                </div>
                <div class="modal-body">
                    <input id="input-700" name="images[]" type="file" multiple=true class="file-loading" >
                </div>
                <div class="modal-footer">
                    <a href="/administracija/refresh" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-ok"></span> Završeno dodavanje</a>
                </div>
            </div>
        </div>
    </div>

    {!! HTML::style('/dragdrop/css/fileinput.css') !!}
    {!! HTML::script('/dragdrop/js/fileinput.min.js') !!}
    <script>
        $("#input-700").fileinput({
            uploadExtraData: {folder: '{{$podaci['slug']}}/'},
            uploadUrl: '/php/upload.php',
            uploadAsync: true,
            allowedFileTypes: ["image", "video","audio"],
            allowedFileExtensions: ["mp4", "avi", "ogg", "wmv", "flv"],
            maxFileSize: 50000,
            maxFileCount: 10
        });
    </script>
@endsection