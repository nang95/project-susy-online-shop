<section class="welcome_area">
    <div class="welcome_slides owl-carousel">

        @foreach ($carousel as $item)
        <div class="single_slide height-800 bg-img background-overlay" 
            style="background-image: url('{{ asset('foto_carousel') }}/{{ $item->image }}');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">{{ $item->subtitle }}</h6>
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">{{ $item->title }}</h2>
                            <a href="#" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        
    </div>
</section>