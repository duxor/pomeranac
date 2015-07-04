<!-- translateButton START:: -->
<div id="google_translate_element" class="nav navbar-nav dropdown"></div>
<script src="/js/stylinggt.js"></script>
<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({
				pageLanguage: 'sr',
				includedLanguages: 'af,ar,az,be,bg,bn,bs,ca,ceb,cs,cy,da,de,el,en,eo,es,et,eu,fa,fi,fr,ga,gl,gu,ha,hi,hmn,hr,ht,hu,hy,id,ig,is,it,iw,ja,jv,ka,kk,km,kn,ko,la,lo,lt,lv,mg,mi,mk,ml,mn,mr,ms,mt,my,nl,no,ny,pa,pl,pt,ro,ru,si,sk,sl,so,sq,su,sv,sw,ta,te,tg,th,tl,tr,uk,ur,uz,vi,yi,yo,zh-CN,zh-TW,zu',
				layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
				autoDisplay: false,
				gaTrack: true,
				gaId: 'UA-60752620-1'
			},
			'google_translate_element'
		);
		changeLeftIcon('/slike/jezik/srpski.jpg');
		changeCenterText('SR');
		changeBorderColor('rgba(0,0,0,0)');
		changeBackgroundColor('rgba(0,0,0,0)');
	}
</script>
<script type="text/javascript">
	(function(){
		var d=window,
			e=document,
			f="text/javascript",
			g="text/css",
			h="stylesheet",
			k="script",
			l="link",
			m="head",
			n="complete",
			p="UTF-8",
			q=".";
		function r(b){
			var a=e.getElementsByTagName(m)[0];
			a||(a=e.body.parentNode.appendChild(e.createElement(m)));
			a.appendChild(b)
		}
		function _loadJs(b){
			var a=e.createElement(k);
			a.type=f;a.charset=p;a.src=b;r(a)
		}
		function _loadCss(b){
			var a=e.createElement(l);
			a.type=g;
			a.rel=h;
			a.charset=p;
			a.href=b;
			r(a)
		}
		function _isNS(b){
			b=b.split(q);
			for(var a=d,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;
			return!0
		}
		function _setupNS(b){
			b=b.split(q);
			for(var a=d,c=0;c<b.length;++c)a=a[b[c]]||(a[b[c]]={});
			return a
		}
		d.addEventListener&&"undefined"==typeof e.readyState&&d.addEventListener("DOMContentLoaded",
			function(){
				e.readyState=n},!1);
		if (_isNS('google.translate.Element')){return}(function(){
			var c=_setupNS('google.translate._const');
			c._cl='sr';
			c._cuc='googleTranslateElementInit';
			c._cac='';
			c._cam='';
			var h='translate.googleapis.com';
			var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';
			var b=s+h;
			c._pah=h;
			c._pas=s;
			c._pbi=b+'/translate_static/img/te_bk.gif';
			c._pci=b+'/translate_static/img/te_ctrl3.gif';
			c._pli=b+'/translate_static/img/loading.gif';
			c._plla=h+'/translate_a/l';
			c._pmi=b+'/translate_static/img/mini_google.png';
			c._ps='/css/translate.css';//c._ps=b+'/translate_static/css/translateelement.css'
			c._puh='translate.google.com';
			_loadCss(c._ps);
			_loadJs(b+'/translate_static/js/element/main_sr.js');})();})();
</script>
<div id="google_translate_element"></div>
<style>
	.goog-te-banner-frame.skiptranslate, .goog-te-banner, .goog-te-banner-frame,.goog-te-banner-frame  {
		background-color:rgba(0,0,0,0);top:none;bottom:0px;
	}
</style>
<!-- translateButton START:: -->