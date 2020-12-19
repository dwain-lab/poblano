<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Events</h2>
        <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">

        @foreach ($events as $event)
            <div class="row event-item">
                <div class="col-lg-6">
                    <img src="{{ $event->getFirstMediaUrl('event-collection', 'gallery') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>{{ $event->heading }}</h3>
                <div class="price">
                    <p><span>${{ $event->cost }}</span></p>
                </div>
                <p class="font-italic">
                    {{ $event->intro }}
                </p>
                <ul>
                    <li><i class="icofont-check-circled"></i> {{ $event->point1 }} </li>
                    <li><i class="icofont-check-circled"></i> {{ $event->point2 }}</li>
                    <li><i class="icofont-check-circled"></i> {{ $event->point3 }} </li>
                </ul>
                <p>
                    {{ $event->end }}
                </p>
                </div>
            </div>
        @endforeach

        {{-- <div class="row event-item">
            <div class="col-lg-6">
            <img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Birthday Parties</h3>
            <div class="price">
                <p><span>$189</span></p>
            </div>
            <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
            </p>
            <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            </ul>
            <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
            </p>
            </div>
        </div>

        <div class="row event-item">
            <div class="col-lg-6">
            <img src="assets/img/event-private.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Private Parties</h3>
            <div class="price">
                <p><span>$290</span></p>
            </div>
            <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
            </p>
            <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            </ul>
            <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
            </p>
            </div>
        </div>

        <div class="row event-item">
            <div class="col-lg-6">
            <img src="assets/img/event-custom.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Custom Parties</h3>
            <div class="price">
                <p><span>$99</span></p>
            </div>
            <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
            </p>
            <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            </ul>
            <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
            </p>
            </div>
        </div> --}}

        </div>

    </div>
    </section><!-- End Events Section -->
