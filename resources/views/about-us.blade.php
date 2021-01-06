<!-- ======= About Section ======= -->
<section id="about" class="about">
<div class="container" data-aos="fade-up">

    <div class="row">
    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
        <div class="about-img">
        <img src={{ asset('assets/img/about.jpg') }} alt="">
        </div>
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        @foreach ($abouts as $about)

            <h3>{{ $about ->heading }}</h3>
            <p class="font-italic">
                {!! $about->intro !!}
            </p>
            <ul>
                <li><i class="icofont-check-circled"></i> {{ $about->point1 }} </li>
                <li><i class="icofont-check-circled"></i> {{ $about->point2 }} </li>
                <li><i class="icofont-check-circled"></i> {{ $about->point3 }}</li>
            </ul>
            <p>
                {!! $about->end !!}
            </p>

        @endforeach
    </div>
    </div>

</div>
</section><!-- End About Section -->
