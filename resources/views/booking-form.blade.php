<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
<div class="container" data-aos="fade-up">

    <style>

    </style>

    <div class="section-title">
    <h2>Reservation</h2>
    <p>Book a Table</p>
    </div>

    {{-- <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"> --}}
    {!! Form::open(['route' => 'booking.store', 'method' => 'post', 'class' => 'php-email-form', 'role' => 'form', 'data-aos' => 'fade-up', 'data-aos-delay' => '100']) !!}
    <div class="form-row">
        <div class="col-lg-4 col-md-6 form-group">
        {{-- <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars"> --}}
            {!! Form::text('name', null, ['placeholder'=>'Your Name', 'class'=>'form-control', 'data-rule'=>'minlen:4', 'data-msg' => 'Please enter at least 4 characters']) !!}
            <div class="validate"></div>
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 form-group">
            {{-- <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email"> --}}
            {!! Form::text('email', null, ['placeholder'=>'Your Email', 'class'=>'form-control', 'data-rule'=>'email', 'data-msg' => 'Please enter a valid email']) !!}
            <div class="validate"></div>
            @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 form-group">
        {{-- <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars"> --}}
            {!! Form::text('phone', null, ['placeholder'=>'Your Phone', 'class'=>'form-control', 'data-rule'=>'minlen:4', 'data-msg' => 'Please enter a phone number']) !!}
            <div class="validate"></div>
            @error('phone')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            <div class="validate"></div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 form-group">
        {{-- <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars"> --}}
            {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'form-control', 'data-rule'=>'minlen:4', 'data-msg' => 'Please enter a date']) !!}
            <div class="validate"></div>
            @error('date')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 form-group">
        {{-- <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars"> --}}
            {!! Form::time('time',\Carbon\Carbon::now(),['class'=>'form-control', 'data-rule'=>'minlen:4', 'data-msg' => 'Please enter a time']) !!}
            <div class="validate"></div>
            @error('time')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 col-md-6 form-group">
        {{-- <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars"> --}}
            {!! Form::number('people', null, ['class'=>'form-control', 'placeholder' => '# of people', 'date-rule' => 'minlen:1', 'data-msg' => 'Please enter a number']); !!}
            <div class="validate"></div>
            @error('people')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        {{-- <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea> --}}
        {!! Form::textarea('message', null, ['placeholder'=>'Your Message', 'class'=>'form-control', 'style' => 'padding-bottom:5px', 'rows' => '5']) !!}
        <div class="validate"></div>
        @error('message')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
    </div>
    <div class="text-center"><button type="submit">Book a Table</button></div>
    {!! Form::close() !!}
    {{-- </form> --}}

</div>
</section><!-- End Book A Table Section -->
