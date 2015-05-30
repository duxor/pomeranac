@extends('master')

@section('title') Galerija @endsection

@section('content')
<div class="col-sm-5">
    <h1>{{$galerija['naslov']}}</h1>
    {!! $galerija['sadrzaj'] !!}
</div>
<div class="col-sm-7">
    @if(sizeof($galerija['foto']))
        <div id="carousel-{{$galerija['slug']}}" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-{{$galerija['slug']}}" data-slide-to="0" class="active"></li>
                @for($i=1;$i<sizeof($galerija['foto']);$i++)
                    <li data-target="#carousel-{{$galerija['slug']}}" data-slide-to="{{$i}}"></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($galerija['foto'] as $i => $slika)
                    @if($i==0)<div class="item active">@else<div class="item">@endif
                            <img src="/{{$slika}}" alt="...">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-{{$galerija['slug']}}" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-{{$galerija['slug']}}" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
            @else <p>Galerija ne sadrži ni jednu fotografiju.</p>
    @endif
</div>
@endsection