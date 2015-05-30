@extends('master')

@section('content')

    @if($galerije)
        <h1>{{$txt['naslov']}}</h1>
        {!! $txt['sadrzaj'] !!}
        <div class="row">
            @foreach($galerije as $g)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$g['foto']}}" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                        <div class="caption">
                            <h1>{{$g['naslov']}}</h1>
                            <p>{{$g['sadrzaj']}}</p>
                            <a href="/galerija/{{$g['slug']}}" type="button" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-picture"></span> Pregled</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Ni jedna galerija nije unesena.</p>
    @endif

@endsection