    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>

        <div data-aos="fade-up">
            {{-- <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed/v1/place?q=17.123441963500312,+-89.09859235548268&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                frameborder="0" allowfullscreen></iframe> --}}
            <iframe style="border:0; height:400px; width:100%;" frameborder="0"
                src="https://www.google.com/maps/embed/v1/place?q=17.123441963500312,+-89.09859235548268&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>69 1/4 George Price Highway, San Ignacio, Cayo, Belize</p>
                        </div>

                        <div class="open-hours">
                            <i class="icofont-clock-time icofont-rotate-90"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Saturday:<br>
                                8:00 AM - 2100 PM
                            </p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@poblano.net</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+501 6152236</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    {{-- <form action="forms/contact.php" method="post" role="form"
                        class="php-email-form"> --}}
                        {!! Form::open(['route' => 'contactUs.store', 'method' => 'post', 'class' => 'php-email-form',
                        'role' => 'form']) !!}
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                {{-- <input type="text" name="name" class="form-control"
                                    id="name" placeholder="Your Name" data-rule="minlen:4"
                                    data-msg="Please enter at least 4 chars" /> --}}
                                {!! Form::text('name', null, ['placeholder' => 'Your Name', 'class' => 'form-control',
                                'data-rule' => 'minlen:4', 'data-msg' => 'Please enter at least 4 characters']) !!}
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                {{-- <input type="email" class="form-control" name="email"
                                    id="email" placeholder="Your Email" data-rule="email"
                                    data-msg="Please enter a valid email" /> --}}
                                {!! Form::text('email', null, ['placeholder' => 'Your Email', 'class' => 'form-control',
                                'data-rule' => 'email', 'data-msg' => 'Please enter a valid email']) !!}
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <input type="text" class="form-control" name="subject"
                                id="subject" placeholder="Subject" data-rule="minlen:4"
                                data-msg="Please enter at least 8 chars of subject" /> --}}
                            {!! Form::text('subject', null, ['placeholder' => 'Subject', 'class' => 'form-control',
                            'data-rule' => 'minlen:4', 'data-msg' => 'Please enter at least 8 chars of subject', 'id' =>
                            'subject']) !!}
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            {{-- <textarea class="form-control" name="message" rows="8"
                                data-rule="required" data-msg="Please write something for us"
                                placeholder="Message"></textarea> --}}
                            {!! Form::textarea('message', null, ['placeholder' => 'Message', 'class' => 'form-control',
                            'data-rule' => 'required', 'data-msg' => 'Please write something for us']) !!}
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            {{-- <div class="sent-message">Your message has been sent.
                                Thank you!</div> --}}
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                        {!! Form::close() !!}
                        {{--
                    </form> --}}

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->
