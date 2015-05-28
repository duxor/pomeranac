<div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <?php for($i=1;$i<sizeof($sliderIMGs);$i++)echo"<li data-target='#carousel' data-slide-to='{$i}'></li>"?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
            foreach($sliderIMGs as $k=>$img){
                echo "<div class='item".($k==0?' active':null)."'>
                        <img src='{$img}' alt='Pomeranac'>
                        <div class='carousel-caption'></div>
                    </div>";
            }
        ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
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