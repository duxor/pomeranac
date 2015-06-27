$(document).ready(function() {
	// navigation click actions	
	$('.scroll-link').on('click', function(event){
		event.preventDefault();
		var sectionID = $(this).attr("data-id");
		scrollToID('#' + sectionID, 750);
	});
	// scroll to top action
	$('.scroll-top').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	// mobile nav toggle
	$('#nav-toggle').on('click', function (event) {
		event.preventDefault();
		$('#main-nav').toggleClass("open");
	});
});
// scroll function
function scrollToID(id, speed){
	var offSet = 50;
	var targetOffset = $(id).offset().top - offSet;
	var mainNav = $('#main-nav');
	$('html,body').animate({scrollTop:targetOffset}, speed);
	if (mainNav.hasClass("open")) {
		mainNav.css("height", "1px").removeClass("in").addClass("collapse");
		mainNav.removeClass("open");
	}
}
//funkcija za zadrzavanje aktivnog taba na strani registracija
$(document).ready(function() {
 $('a[data-toggle="tab"]').on('click', function (e) {
    localStorage.setItem('lastTab', $(e.target).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
      $('a[href="'+lastTab+'"]').click();
  }
});
/*#
 ### Autor: Dusan Perisci
 ### Home: dusanperisic.com
 ###
 ### Napomena: 	Klasa je pisana kao dodatak Bootstrap framework-a
 ###			Voditi racuna o formatiranju koje je potrebno da bude zadovoljeno (Pogledati primjer ispod)
 ### 			Ukoliko ne želite da se određeno polje nađe u provjeri ne treba mu dodjeljivati ID
 ###			ID = NAZIV_POLJA
 ###			ID_DIV = dID
 ###			ID_SPAN = sID
 ### ------------------------------------------------------------------
 ### Primjer:
 ### HTML:
 ### <form id="forma" class="form-horizontal">
 ### 	<div id="dime" class="form-group has-feedback">
 ###		<label for="ime" class="control-label col-sm-2">Ime</label>	
 ###		<div class="col-sm-10">
 ###			<input id="ime" name="ime" class="form-control" placeholder="Unesite vaše ime">
 ### 			<span id="sime" class="glyphicon form-control-feedback"></span>
 ###		</div>
 ### 	</div>
 ###	<div class="form-group">
 ###		<div class="col-sm-2"></div>
 ###		<div class="col-sm-10">
 ###			<button type="button" class="btn btn-lg btn-success" onClick="SubmitForm.submit('forma')">
 ###				Submit
 ###			</button>
 ###		</biv>
 ###	</div>
 ### </form>
 ###
 */
var SubmitForm = {
	submit: function(formaID){
		if(this.check(formaID)) $('#'+formaID).submit();
		else alert('Popunite sve podatke.');
	},
    check:function(formaID){
        var test=1;
        var inputi = $('#'+formaID+' :input:visible[id]');
        for(i=0; i< inputi.length; i++)test = this.succErr(inputi[i], test);
        return test;
    },
	testEmail: function(email){
		var i1 = email.indexOf('@'),
			i2 = email.indexOf('.');
		if((i1 < 1 || i2 < 1) || (i1 > i2)) return false;
		else return true;
	},
	succErr: function(input, t){
		if($(input).val().length > 2 && ($(input).attr('type')=='email'?this.testEmail($(input).val()):true)){
			this.successTag(input.name);
			return t;
		}else{
            this.errorTag(input.name);
			return 0;
		}
	},
    successTest:function(upit,inputName){
        if(upit) this.successTag(inputName);
        else this.errorTag(inputName);
        return upit;
    },
    successTag:function(inputName){
        $('#d'+inputName).removeClass('has-error');
		$('#d'+inputName).addClass('has-success');
		$('#s'+inputName).removeClass('glyphicon-remove');
		$('#s'+inputName).addClass('glyphicon-ok');
    },
    errorTag:function(inputName){
		$('#d'+inputName).removeClass('has-success');
		$('#d'+inputName).addClass('has-error');
		$('#s'+inputName).removeClass('glyphicon-ok');
		$('#s'+inputName).addClass('glyphicon-remove');
    }
}
/*#
 ### Autor: Dusan Perisci
 ### Home: dusanperisic.com
 ###
 ### Napomena: 	Klasa je pisana kao dodatak Laravel framework-a
 ### ------------------------------------------------------------------
 ### Primjer:
 ### HTML:  <div id="poruka" style="display: none"></div>
 ###        <div id="wait" style="display:none"><center><i class='icon-spin6 animate-spin' style="font-size: 350%"></i></center></div>
 ###        <div id="hide">
 ###            {!!Form::hidden('_token',csrf_token())!!}
 ###            {!!Form::text('prezime',null,['class'=>'form-control'])!!}
 ###            {!!Form::text('ime',null,['class'=>'form-control'])!!}
 ###            {!!Form::button('<span class="glyphicon glyphicon-save"></span> Sačuvaj',['class'=>'btn btn-lg btn-primary','onclick'=>'Komunikacija.posalji("/url","podaciID","poruka","wait","hide")'])!!}
 ###        </div>
 ###
 ### LARAVEL metoda:
 ### 	public function postTest(){
 ###        $podaci=json_decode(Input::get('podaci'));
 ###		return json_encode(['msg'=>'prezime='.$podci->prezime.' ime='.$podaci->ime,'check'=>1]);
 ###	}
 ### VARIJABLE:
 ### url = adresa kojoj se prosledjuju podaci
 ### podaciID = promjenjiva koja sadrzi ID elementa koji obuhvata sve input elemente za prenos podataka, ukljucujuci i _token=csrf_token()
 ### poruka = ID elementa u kome ce da se ispisuje poruka
 ### wait = ID elementa koji sadrzi wait animaciju
 ### hide = ID elementa ciji sadrzaj treba da se sakrije dok je wait aktivan
 ###
*/
var Komunikacija = {
    posalji: function(url,podaciID,poruka,wait,hide){
        var podaci=this.podaci('',null,podaciID,{});
        $('#'+hide).css('display','none');
        $('#'+wait).fadeToggle();
        $.post(url,
            {
                _token:podaci['_token'],
                podaci:JSON.stringify(podaci)
            },
            function(data){
                data=JSON.parse(data);
                $('#'+poruka).html('<div class="alert alert-'+ (data['check']?'success':'danger') +'" role="alert">'+data['msg']+'</div>');
                $('#'+wait).fadeToggle();
                $('#'+poruka).fadeToggle('slow');
                window.setTimeout(function(){
                    $('#'+poruka).fadeToggle('slow');
                    $('#'+hide).fadeToggle('slow')
                },5000);
            }
        );
    },
    podaci:function(i,inputi,podaciID,podaci){
        if(inputi==null) {
            var inputi = $('#' + podaciID + ' :input');
            i = inputi.length - 1;
        }
        podaci[inputi[i].name]=inputi[i].value;
        if(i==0) return podaci;
        return this.podaci(i-1,inputi,null,podaci);
    },
    proslijedi:function(url,token,podaci){
        $.post(url,{
            _token:token,
            podaci:JSON.stringify(podaci)
        },function(data){
            return data;
        });
    },
    proslijediSaPrikzom:function(url,token,podaci,poruka,wait,hide){
        $('#'+hide).css('display','none');
        $('#'+wait).fadeToggle();
        $.post(url,{
            _token:token,
            podaci:JSON.stringify(podaci)
        },function(data){
            data=JSON.parse(data);
            $('#'+poruka).html('<div class="alert alert-'+ (data['check']?'success':'danger') +'" role="alert">'+data['msg']+'</div>');
            $('#'+wait).fadeToggle();
            $('#'+poruka).fadeToggle('slow');
            window.setTimeout(function(){
                $('#'+poruka).fadeToggle('slow');
                $('#'+hide).fadeToggle('slow')
            },5000);
        });
    }
}

/*#
 ### Autor: Dusan Perisci
 ### Home: dusanperisic.com
 ###
 ### Napomena: 	Klasa je pisana kao podrška kontrole fullscreen opcije
 ###            za različite tipove browser-a.
 ### ------------------------------------------------------------------
 ### Uputstvo:
 ###            Sve što je potrebno uraditi je dodati: window.onload = function(){ fullScreen.showModal(); }
 ###            u sastav JavaScript koda. Podaci koji mogu da mijenjaju su promjenjive:
 ###                title               - naslov modal prozora sa pitanjem korisnika za izbor punog ekrana (u nastavku modal)
 ###                content             - sadržaj modala, objašnjenje korisniku
 ###                fullScreenBtnTtl    - naslov dugmeta za puni ekran
 ###                noFullScreenBtnTtl  - naslov dugmeta za nastavak bez moda punog ekrana
 ### ------------------------------------------------------------------
#*/ 
//window.onload = function(){ fullScreen.showModal(); }
var fullScreen ={
    title:'Najbolji ugođaj',
    content:'<p>Za najbolji ugođaj omogućili smo pregled web sajta u režimu punog ekrana. Za izlaz iz istog pritisnite dugme esc na Vašoj tastaturi.</p>',
    fullScreenBtnTtl:'Režim punog ekrana',
    noFullScreenBtnTtl:'Nastavak u browser modu',
    showModal:function(){
        $('body').append('<div id="fullScreenModal" class="modal fade" style="background-color:rgba(0,0,0,0.8)"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button class="close" data-dismiss="modal">&times;</button><h2>'+this.title+'</h2></div><div class="modal-body">'+this.content+'<p><button class="btn btn-lg btn-primary" onclick="fullScreen.toggle()"><i class="glyphicon glyphicon-fullscreen"></i> '+this.fullScreenBtnTtl+'</button><button class="btn btn-lg btn-default" data-dismiss="modal">'+this.noFullScreenBtnTtl+'</button></p></div></div></div></div>');
        $('#fullScreenModal').modal('show');
    },
    toggle:function(){
        if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) 
            if (document.documentElement.requestFullScreen)  
                document.documentElement.requestFullScreen();  
            else    if (document.documentElement.mozRequestFullScreen) 
                        document.documentElement.mozRequestFullScreen();  
                    else    if (document.documentElement.webkitRequestFullScreen) 
                                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
                             else   if (document.cancelFullScreen)  
                                        document.cancelFullScreen();  
                                    else    if (document.mozCancelFullScreen)   
                                                document.mozCancelFullScreen();  
                                            else    if (document.webkitCancelFullScreen)  
                                                    document.webkitCancelFullScreen();  
        $('#fullScreenModal').modal('hide');
    }
  
}
//#MODAL
var duXorModal ={
    isInBody:false,
    animateSpeed:400,
    show:function(el){
        $('body').append('<div id="duXorModal">'+
                                '<div class="duXorModal-body">'+
                                    '<button style="position:fixed;top:0px;right:0px;z-index:999" class="btn btn-xs btn-danger" onclick="duXorModal.hide()"><svg height="50" width="50"><line x1="0" y1="0" x2="50" y2="50" style="stroke:#fff;stroke-width:10" />  <line x1="0" y1="50" x2="50" y2="0" style="stroke:#fff;stroke-width:10" />Izvinjavamo se, Vaš browser ne podržava SVG.</svg></button>'+
                                    '<div class="col-sm-3">'+
                                        '<h2 style="padding-top:50px">'+
                                            $(el).children('p').html()+
                                        '</h2>'+
                                        '<div class="text"></div>'+
                                    '</div>'+
                                '</div>'+
                             '</div>');
        this.isInBody=true;
        $.post('/galerija',{_token:$('#_token').val(),slug:$(el).data('slug')},function(data){
            var podaci = JSON.parse(data), indikatori = '', fotoHtml = '';console.log(podaci,podaci.foto.length);
            for(var i=0; i<podaci.foto.length; i++){
                indikatori += '<li data-target="#galerijaSlajderFoto" data-slide-to="'+i+'"'+(i==0?'class="active"':'')+'></li>';
                fotoHtml += '<div class="item '+(i==0?'active':'')+'"><img style="width:100%" src="/'+podaci.foto[i]+'" alt="Pomeranac fotografija '+i+'"></div>';
            }
            $('#duXorModal').find('.text').html(podaci.text);console.log(indikatori,fotoHtml);
            $('#duXorModal').children('.duXorModal-body').append('<div class="col-sm-9"><div id="galerijaSlajderFoto" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">'+indikatori+'</ol><div class="carousel-inner" role="listbox">'+fotoHtml+'</div><a class="left carousel-control" href="#galerijaSlajderFoto" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#galerijaSlajderFoto" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div>');
            $('#galerijaSlajderFoto').carousel()
            $('#duXorModal').slideDown();
        });
    },
    hide:function(){
        $('#duXorModal').slideUp(this.animateSpeed,function(){
            $('#duXorModal').remove();
        });
        this.isInBody=false
    },
    disableScroll:function(){
        event.preventDefault();
    }
}