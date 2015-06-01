@extends('administracija.master')
@section('body')
    @if($podaci['galerije'])
        <div class="list-group col-sm-4">
            <p style="text-align: right">
                <button class="btn btn-default sakrijListu"><i class="glyphicon glyphicon-circle-arrow-left strelica"></i></button>
                <button class="btn btn-primary" data-target="#novaGalerija" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i></button>
                <button class="btn btn-info editMod" style="margin:0 5px"><i class="glyphicon glyphicon-pencil"></i></button>
            </p>
            <div id="galerije" style="overflow-y: scroll">
                @foreach($podaci['galerije'] as $galerija)
                    <a style="cursor: pointer" class="list-group-item" data-link="slike/galerije/{{$galerija['slug']}}" data-slug="{{$galerija['slug']}}">
                        <button class="btn btn-success _upload" data-toggle="modal" data-target="#dodajFoto" style="position: absolute;right: 5px;top: 5px"><i class="glyphicon glyphicon-cloud-upload"></i></button>
                        <h2 style="text-align: center">{{$galerija['naslov']}}</h2>
                        <p class="list-group-item-text">
                            {{$galerija['sadrzaj']}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-8 work-area">
            <div id="poruka" style="display: none"></div>
            <div id="wait" style="display:none"><center><i class='icon-spin6 animate-spin' style="font-size: 350%"></i></center></div>
            <div id="foto"></div>
            <style>.clFoto{width:100%;cursor: pointer}.prikaz{width: 100%}._upload{display: none}</style>
            <i class='icon-spin6 animate-spin' style="color: rgba(0,0,0,0)"></i>
        </div>
        <script>
            $(document).ready(function(){$('#galerije').css('height',($(window).height()-150)+'px')});
            var sirina='50px';
            $('.sakrijListu').click(function(){
                $('.work-area').hide();
                $('.list-group').animate({width:sirina},350);
                $('.editMod').toggle();
                $('.list-group-item').toggle();
                $('.strelica').toggleClass('glyphicon-circle-arrow-left');
                $('.strelica').toggleClass('glyphicon-circle-arrow-right');
                $(this).show();
                $('.work-area').animate({width:sirina=='50px'?'95%':'70%'},350);
                $('.work-area').fadeIn();
                sirina=sirina=='50px'?'30%':'50px';
            });
            var editMod=false, slugApp=false, serverUrl='{{url('/')}}}';
            $('.editMod').click(function(){editMod=!editMod;$('.prikaz').popover('hide')});
            function slikaOption(){if(editMod)$('.prikaz').popover('toggle')}
            function prikazSlike(objekat){
                $('.prikaz').popover('destroy');
                $('.prikaz').attr('src',objekat.src);
                $('.prikaz').data('toggle','popover');
                $('.prikaz').data('trigger','focus');
                $('.prikaz').data('placement','left');
                $('.prikaz').data('html','true');
                $('.prikaz').attr('title','Opcije');
                $('.prikaz').data('content','<button onclick="ukloniFoto(\''+objekat.src+'\',\''+objekat.id+'\')"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>');
                $('.prikaz').fadeIn();
                if(editMod)$('.prikaz').popover('show');
            }
            function ukloniFoto(url,id){
                $('.prikaz').popover('hide');
                $('#wait').fadeIn();
                $.post('/administracija/galerije/ukloni-foto',{
                    _token:'{{csrf_token()}}',
                    link:url.substr(serverUrl.length)
                },function(data){
                    if(JSON.parse(data).msg=='OK'){
                        $('.prikaz').fadeOut();
                        $('#'+id).fadeOut();
                        $('#wait').hide();
                    }
                });
            }
            $('a.list-group-item').click(function(){
                $('#foto').hide();
                $('#wait').fadeIn();
                $('a.list-group-item').removeClass('active');
                $('._upload').fadeOut();
                $(this).find('._upload').fadeIn();
                $(this).addClass('active');
                var slug=$(this).data('slug');
                $.post('/administracija/galerije/lista-fotografija',
                        {
                            _token:'{{csrf_token()}}',
                            folder:$(this).data('link')
                        },
                        function(data){
                            var podaci=JSON.parse(data),
                                fotografije=podaci['foto'],
                                video=podaci['video'],
                                foto='<img class="prikaz thumbnail" onclick="slikaOption()" style="display: none">',
                                check=false;
                            if(fotografije.length){
                                for(var i=0;i<fotografije.length;i++)
                                    foto += '<div class="col-xs-6 col-md-3"><img id="slika-'+i+'" onclick="prikazSlike(this)" class="clFoto thumbnail" src="/' + fotografije[i] + '"></div>';
                                check=true;
                            }
                            else foto='<p>Ni fotografija ni video nije dodat u evidenciju.</p>';
                            if(video.length){
                                for(var i=0;i<video.length;i++)
                                    foto += '<video width="300px" height="200px" controls><source src="/administracija/galerije/video/'+slug+'/'+video[i]+'" type="video/mp4"><div class="file-preview-other"><i class="glyphicon glyphicon-file"></i></div></video>';
                                check=true;
                            }
                            if(!check) foto='<p>Ni fotografija ni video nije dodat u evidenciju.</p>';
                            $('#foto').html(foto);
                            $('#wait').hide();
                            $('#foto').fadeIn();
                });
            });
        </script>
    @else
        <p>Ne postoji ni jedna galerija.</p>
    @endif
    <div class="modal fade" id="dodajFoto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h2>Dodaj nove fotografije</h2>
                </div>
                <div class="modal-body">
                    <input id="input-700" name="images[]" type="file" multiple=true class="file-loading" >
                    {!!Form::hidden('folder',null,['id'=>'folder'])!!}
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-lg btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span> Završeno dodavanje</a>
                </div>
            </div>
        </div>
    </div>

    {!! HTML::style('/dragdrop/css/fileinput.css') !!}
    {!! HTML::script('/dragdrop/js/fileinput.min.js') !!}
    <script>
        $('._upload').click(function(){
            $('#input-700').fileinput('clear');
            $('#folder').val($(this).closest('a').data('link')+'/');
            $("#input-700").fileinput('refresh',{
                uploadExtraData: {folder: $('#folder').val(), _token:'{{csrf_token()}}'},
                uploadUrl: '/administracija/galerije/upload',
                uploadAsync: true,
                maxFileCount: 10
            });
        });
    </script>
    <div class="modal fade" id="novaGalerija">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h2>Nova galerija</h2>
                </div>
                {!!Form::open(['class'=>'form-horizontal','id'=>'novaGalerijaForma'])!!}
                <div class="modal-body">
                    <div id="msgPoruka" class="alert"></div>
                    <div id="dnaziv" class="form-group has-feedback">
                        {!!Form::label('lnaziv','Naziv',['class'=>'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                            {!!Form::text('naziv',null,['class'=>'form-control','placeholder'=>'Naziv','id'=>'naziv'])!!}
                            <span id="snaziv" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div id="dslug" class="form-group has-feedback">
                        {!!Form::label('lslug','Slug',['class'=>'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                            {!!Form::text('slug',null,['class'=>'form-control','placeholder'=>'Slug','id'=>'slug'])!!}
                            <span id="sslug" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div id="dopis" class="form-group has-feedback">
                        {!!Form::label('lopis','Opis',['class'=>'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                            {!!Form::textarea('opis',null,['class'=>'form-control','placeholder'=>'Opis','id'=>'opis'])!!}
                            <span id="sopis" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!!Form::button('<i class="glyphicon glyphicon-trash"></i> Resetuj',['class'=>'btn btn-lg btn-danger','type'=>'reset'])!!}
                    {!!Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Sačuvaj',['class'=>'btn btn-lg btn-success dodajNovuGaleriju'])!!}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    <script>
        $('.dodajNovuGaleriju').click(function(){
            if(SubmitForm.check('novaGalerijaForma')) {
                var slug=$('#novaGalerijaForma').find('input[name=slug]').val(),
                    naslov=$('#novaGalerijaForma').find('input[name=naziv]').val(),
                    opis=$('#novaGalerijaForma').find(':input[name=opis]').val();
                $.post('/administracija/galerije/nova', {
                    _token: $('#novaGalerijaForma').children('input[name=_token]').val(),
                    naziv: naslov,
                    slug: slug,
                    opis: opis
                },
                function(data){
                    var rezultat=JSON.parse(data);
                    if(rezultat.check) {
                        $('#novaGalerijaForma')[0].reset();
                        $('#msgPoruka').html(rezultat.msg).removeClass('alert-success alert-danger').addClass('alert-success').fadeIn('slow');
                        $('#galerije').append(
                                '<a style="cursor: pointer" class="list-group-item" data-link="slike/galerije/' + slug + '" data-slug="' + slug + '"> \
                                <h2 style="text-align: center">' + naslov + '</h2> \
                                <p class="list-group-item-text">Učitajte stranicu ponovo da bi nova galerija bila vidljiva.</p> \
                            </a>');
                    }
                });
            }
        });
    </script>
@endsection