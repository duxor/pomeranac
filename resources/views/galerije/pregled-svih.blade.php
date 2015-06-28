@extends('master')
@section('content')
    <h1>Sve naše galerije - Pomeranac</h1>
    <p>{!!$galerija['sadrzaj']!!}</p>
     @if($galerije)
        @foreach($galerije as $g)
        <div class="col-sm-4 galerijaFoto" style="padding:0px;marginr:0px" onmouseover="duXorFotoEfect.showTitle(this)" onmouseout="duXorFotoEfect.showTitle(this)">
            <img src="{{$g['foto']}}" style="height:100%;width:100%">
            <div onclick="duXorModal.show(this)" class="naslov" data-slug="{{$g['slug']}}" onmouseout="duXorFotoEfect.showTitle(this)">
                <p>{{$g['naslov']}}</p>
            </div>
        </div>
        @endforeach
    @else
        <p style="margin-top:100px">Ni jedna galerija nije unesena.</p>
    @endif
@endsection