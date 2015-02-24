<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="slike/slider/1.jpg" alt="Slika 1">
            <div class="carousel-caption">
                <h1>Pomeranac</h1>
                <p>pas koji laje</p>
            </div>
        </div>
        <div class="item">
            <img src="slike/slider/2.jpg" alt="Slika 2">
            <div class="carousel-caption">
                <h1></h1>
                <p>Pomeranac je as koji laje</p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a><br clear="all">
</div><br clear="all">
<style>
    .carousel-inner .item .carousel-caption h1, .carousel-inner .item .carousel-caption p{
        color: #000;
    }
    .carousel-inner .item .carousel-caption h1{
        font-weight: bold;
    }
    @media (max-width: 789px) {
        .carousel-inner .item .carousel-caption h1, .carousel-inner .item .carousel-caption p{
            font-size: 100%;
        }
        .carousel-caption{
            padding-bottom: 10%;
        }
    }
    @media (min-width: 789px) {
        .carousel-inner .item .carousel-caption h1, .carousel-inner .item .carousel-caption p{
            font-size: 200%;
        }
        .carousel-caption{
            padding-bottom: 15%;
        }
    }
</style>