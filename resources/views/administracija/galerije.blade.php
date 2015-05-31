@extends('administracija.master')

@section('content')
    @if($galerije)
        <div class="panel-group" id="galerije" role="tablist" aria-multiselectable="true">
            @foreach($galerije as $key => $galerija)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{$galerija['slug']}}">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#galerije" href="#collapse{{$galerija['slug']}}" aria-expanded="true" aria-controls="collapse{{$galerija['slug']}}">
                                {{$galerija['naslov']}} @if($galerija['aktivan']==1)<span class="glyphicon glyphicon-ok"></span> @else <span class="glyphicon glyphicon-remove"></span>@endif
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$galerija['slug']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$galerija['slug']}}">
                        <div class="panel-body">
                            <div class="col-sm-7">
                                <a href="/administracija/galerija/{{$galerija['slug']}}" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-pencil"></span> Uredi</a>
                                <a href="/administracija/galerija-status/{{$galerija['slug']}}" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-check"></span> Promeni status</a>
                                @if($galerija['slug']!='osnovni-slider')
                                    <a href="/administracija/galerija-obrisi/{{$galerija['slug']}}" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                                @endif
                                <p>{!!$galerija['sadrzaj']!!}</p>
                            </div>
                            <div class="col-sm-5">
                                @if(isset($galerija['slike']))
                                    @if(sizeof($galerija['slike']))
                                        <div id="carousel-{{$galerija['slug']}}" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-{{$galerija['slug']}}" data-slide-to="0" class="active"></li>
                                                @for($i=1;$i<sizeof($galerija['slike']);$i++)
                                                    <li data-target="#carousel-{{$galerija['slug']}}" data-slide-to="{{$i}}"></li>
                                                @endfor
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                @foreach($galerija['slike'] as $i => $slika)
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Ne postoji ni jedna galerija.</p>
    @endif
    <a href="#" data-toggle="modal" data-target="#novaGalerija" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Dodaj novu</a>
@endsection

@section('body')

    <div class="modal fade" id="novaGalerija">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Nova galerija</h3>
                </div>
                {!! Form::open(['url'=>'/administracija/galerija','class'=>'form-horizontal','id'=>'forma']) !!}
                    <div class="modal-body">
                        <div id="dnaslov" class="form-group has-feedback">
                            {!! Form::label('lnaziv','Naziv',['class'=>'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('naslov',null,['class'=>'form-control','placeholder'=>'Primer galerija 1','id'=>'naslov']) !!}
                                <span id="snaslov" class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div id="dslug" class="form-group has-feedback">
                            {!! Form::label('lslug','Slug',['class'=>'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'primer-galerija-1','id'=>'slug']) !!}
                                <span id="sslug" class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div id="dsadrzaj" class="form-group has-feedback">
                            {!! Form::label('lopis','Opis',['class'=>'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('sadrzaj',null,['class'=>'form-control','placeholder'=>'Primer galerija 1 sadrži najnovije fotografije za potrebe testiranja...','id'=>'sadrzaj']) !!}
                                <span id="ssadrzaj" class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::button('<span class="glyphicon glyphicon-floppy-disk"></span> Dodaj',['class'=>'btn btn-lg btn-primary', 'type'=>'button', 'onClick'=>'SubmitForma.submit("forma")']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash"></span> Obriši',['class'=>'btn btn-lg btn-danger', 'type'=>'reset']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection