<section id="reviews" class="container wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
    <div class="row text-center">
        <div class="col-md-12 stars">
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star big"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div id="reviews-carousel" class="slick">
                @foreach($reviews as $review)
                    <div class="item">
                        <div class="review">
                            {{ $review->content }}
                        </div>
                        <div class="author">
                            {{ $review->author }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
