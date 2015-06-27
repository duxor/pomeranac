@extends('administracija.master')


@section('content')</br></br>
    <div class="col-sm-3">

                    <li style="list-style-type:none; " class="dropdown">
                          <a style="text-decoration:none;" id="pocetna"  href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Početna <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li id="pocetna1" role="presentation"><a onclick="getPosalji('pocetna1')"><span class="glyphicon glyphicon-home">  </span> Pomeranac</a></li>
                              <li id="pocetna2" role="presentation"><a onclick="getPosalji('pocetna2')"><span class="glyphicon glyphicon-user"> </span> Prvi Pomeranac u Srbiji</a></li>
                          </ul>
                      </li>

        <ul class="nav nav-pills nav-stacked">
           {{--<li id="pocetna1" role="presentation"><a href="#" onclick="getPosalji('pocetna')">Početna<span class="caret"></span></a></li>--}} 
            <li id="o-nama" role="presentation"><a href="#" onclick="getPosalji('o-nama')">O nama</a></li>
            <li id="o-rasi" role="presentation"><a href="#" onclick="getPosalji('o-rasi')">O rasi</a></li>
            <li id="o-psu" role="presentation"><a href="#" onclick="getPosalji('o-psu')">O psu</a></li>
            <li id="kontakt" role="presentation"><a href="#" onclick="getPosalji('kontakt')">Kontakt</a></li>
        </ul>
    </div>
    <div id="work-area" class="col-sm-9">
        <i class='icon-spin6 animate-spin' style="color: rgba(0,0,0,0)"></i>
        <div id="wait" style="display:none"><center><i class='icon-spin6 animate-spin' style="font-size: 200%"></i></center></div>
        <div id="show"></div>
        <div id="poruka" style="display: none"></div>
        <div id="zaSlanje" class="form-horizontal">
            {!!Form::hidden('_token',csrf_token())!!}
            {!!Form::hidden('slug','slug',['id' => 'slug'])!!}
            <div class="form-group">
                {!! Form::label('lnaslov','Naslov', ['class'=>'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('naslov', $sadrzaj['naslov'],  ['id'=>'naslov','placeholder'=>'Naslov', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('lsadrzaj','Sadrzaj', ['class'=>'col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('sadrzaj', $sadrzaj['sadrzaj'],  ['id'=>'area','placeholder'=>'Sadrzaj', 'class' => 'tinymce form-control']) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::button('<span class="glyphicon glyphicon-envelope"></span> Pošalji',['id'=>'salji', 'class'=>'btn btn-lg btn-primary','onclick'=>'Komunikacija.posalji("/admin/sadrzaji/sadrzaj",\'zaSlanje\',\'poruka\',\'wait\',\'asd\')' ]) !!}  
            </div>
        </div>
    </div>

<script>
$(document).ready(function() { 
    setActive('pocetna1');
    getPosalji('pocetna1');
   $('textarea.tinymce').tinymce({ 
      script_url : 'tinymce/jquery.tinymce.min.js',  
      theme : "modern",
      plugins: [
                "autosave advlist autolink lists link image charmap print preview hr anchor pagebreak",
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
   $('#salji').click(function() {
    $('textarea:tinymce').tinymce().save();
});

});  

   function setActive(ID){
            $('.active').removeClass('active');
            $('#'+ID).addClass('active');
        }
    function getPosalji(val){
        setActive(val);
            $('#zaSlanje').hide();
            $('#wait').show();   
            
            $.post('/admin/sadrzaji/area',{
                    _token:'{{csrf_token()}}' ,
                    tip:val        
                },function(data){
                 var podaci = $.parseJSON(data);          
                  $('textarea:tinymce').html(podaci.sadrzaj);
                  $('#naslov').val(podaci.naslov);
                }
             );
            $('#wait').hide();
            $('#zaSlanje').fadeIn();
            $('#slug').val(val);
    }
</script>




{{--
    <script>
        $(document).ready(function(){
            switch('{{$podaci['akcija']}}'){
                case'novi':kreirajNovi();break;
                case'pregled':getPregled();break;
            }
        });
        function setActive(ID){
            $('.active').removeClass('active');
            $('#'+ID).addClass('active');
        }
        function kreirajNovi(){
            setActive('novi');
            $('#show').hide();
            $('#wait').show();
            $('#show').html(
                    '<div id="zaSlanje" class="form-horizontal">'+
                    '{!!Form::hidden('_token',csrf_token())!!}'+
            '<div class="form-group">'+
            '{!!Form::select('app',$podaci['app'],null,['class'=>'form-control'])!!}'+
            '</div>'+
            '<div class="form-group">'+
            '<input name="naslov" class="form-control" placeholder="Naslov">'+
            '</div>'+
            '<div class="form-group">'+
            '<textarea name="tekst" class="form-control" placeholder="Objava..." rows="7"></textarea>'+
            '</div>'+
            '<div class="form-group">'+
            '<button class="btn btn-lg btn-primary" onclick="Komunikacija.posalji(\'/{{\App\OsnovneMetode::osnovniNav()}}/blog/dodaj-objavu\',\'zaSlanje\',\'poruka\',\'wait\',\'show\')"><i class="glyphicon glyphicon-envelope"></i> Pošalji</div>'+
            '</div>'+
            '</div>');
            $('#wait').hide();
            $('#show').fadeIn();
        }
        function getPregled(){
            setActive('pregled');
            $('#show').hide();
            $('#wait').show();
            $.post('/{{\App\OsnovneMetode::osnovniNav()}}/blog/pregled/{{Session::get('username')}}',{
                _token:'{{csrf_token()}}'
            },function(data){
                if(data) {
                    var podaci = JSON.parse(data);
                    if (podaci.length) {
                        var objave = '';
                        for (var i = 0; i < podaci.length; i++)
                            objave += '<div onclick="getPoruka(\'' + podaci[i].naslov + '\',\'poslate\')" class="citajPoruku">'+
                                        '<div class="nDn col-sm-3">Naslov</div><div class="col-sm-9">' + podaci[i].naslov +
                                        '</div><div class="nDn col-sm-3">Objava</div><div class="col-sm-9">' + podaci[i].tekst +
                                        '</div><div class="nDn col-sm-3">Aktivan</div><div class="col-sm-9">' + podaci[i].aktivan + '</div></div>';
                        $('#show').html(objave);
                    } else $('#show').html('<p>Nemate ni jednu objavu.</p>');
                } else $('#show').html('<p>Greška u autentifikaciji. Kontaktirajte administratora.</p>');
                $('#wait').hide();
                $('#show').fadeIn();
            });
        }
    </script>
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
</script>--}}
@endsection
@section('body')

@endsection