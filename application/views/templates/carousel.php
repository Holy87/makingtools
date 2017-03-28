<?php
require_once ABS_PATH.'application/models/CarouselElement.php';
require_once ABS_PATH.'application/models/Carousel.php';

$elements = Carousel::getElements();

function carousel_list() {
    global $elements;
    $code = '';
    $i = 0;
    /** @var CarouselElement $element */
    foreach($elements as $element)
    {
        $code.='<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$element->get_class().'"></li>';
    }
    echo $code;
}

function fill_carousel() {
    $code = '';
    global $elements;
    /** @var CarouselElement $element */
    foreach($elements as $element)
    {
        $code.=
            '<div class="carousel-item'.$element->get_class().'">
                <img class="d-block img-fluid" src="'.$element->getImageUrl().'" alt="'.$element->getTitle().'">
                <div class="container">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1>'.$element->getTitle().'</h1>
                        <p>'.$element->getDescription().'</p>
                        <p><a class="btn btn-lg btn-primary" href="'.$element->getUrl().'" </p>
                    </div>';
    }
}
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php carousel_list(); ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget
                        quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor
                        id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget
                        quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor
                        id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget
                        quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor
                        id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>