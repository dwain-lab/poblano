@extends('admin.layouts.app')

@section('active_event', 'active')

@section('scriptHead')
    @include('admin.layouts.__includes.__tinyeditor')
    @include('admin.layouts.__includes.__validation')
    @include('admin.layouts.__includes.__alerty')
@endsection

@section('content')

    @include('admin.layouts.__includes.__error_display')

    <div class="container position-relative text-lg-left aos-init aos-animate">

        <div style="padding-top:3%">

            <a class="btn btn-primary" href="{{ route('event.create') }}" title="Add New"
                style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
            </a>
            <a class="btn btn-primary" href="{{ route('event.index') }}" title="Go Back"
                style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                </svg>
            </a>
        </div>
        <!-- Search form -->
        {{-- <div class="search-inline" style="width: 100%; display:grid">
            --}}
            {{-- {!! Form::open([
            'route' => '',
            'method' => 'get',
            'class' => 'form-control
            form-control-search',
            ]) !!}
            {!! Form::text('search', null, ['class' => 'form-control form-control-margin', 'required',
            'placeholder=search']) !!}
            {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-secondary']) !!}
            {!! Form::close() !!} --}}
            {{-- </div> --}}
        {!! Form::open(['route' => ['event.update', $event->id], 'method' => 'patch', 'files' => 'true', 'id' =>
        'eventEditForm']) !!}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('heading', '*Heading') !!}</strong>
                    {!! Form::text('heading', $event->heading, [
                    'placeholder' => 'Enter a heading',
                    'class' =>
                    'form-control
                    ' . ($errors->has('heading') ? ' is-invalid' : null),
                    'spellcheck' => 'true',
                    $errors->has('heading') ? 'autofocus' : null,
                    ]) !!}
                    @error('heading')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('cost', '*Price') !!}</strong>
                    {!! Form::text('cost', $event->cost, ['placeholder' => 'Enter a price', 'class' => 'form-control ' .
                    ($errors->has('cost') ? ' is-invalid' : null), 'spellcheck' => 'true', $errors->has('cost') ?
                    'autofocus' : null]) !!}
                    @error('cost')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('intro', '*Introduction') !!}</strong>
                    {!! Form::textarea('intro', $event->intro, ['placeholder' => 'Enter an Introduction', 'class' =>
                    'form-control tinyeditor', 'spellcheck' => 'true']) !!}
                    @error('intro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point1', '*Point 1') !!}</strong>
                    {!! Form::text('point1', $event->point1, [
                    'placeholder' => 'Enter a point',
                    'class' =>
                    'form-control
                    ' . ($errors->has('point1') ? ' is-invalid' : null),
                    'spellcheck' => 'true',
                    $errors->has('point1') ? 'autofocus' : null,
                    ]) !!}
                    @error('point1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point2', '*Point 2') !!}</strong>
                    {!! Form::text('point2', $event->point2, [
                    'placeholder' => 'Enter a point',
                    'class' =>
                    'form-control
                    ' . ($errors->has('point2') ? ' is-invalid' : null),
                    'spellcheck' => 'true',
                    $errors->has('point2') ? 'autofocus' : null,
                    ]) !!}
                    @error('point2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point3', '*Point 3') !!}</strong>
                    {!! Form::text('point3', $event->point3, [
                    'placeholder' => 'Enter a point',
                    'class' =>
                    'form-control
                    ' . ($errors->has('point3') ? ' is-invalid' : null),
                    'spellcheck' => 'true',
                    $errors->has('point3') ? 'autofocus' : null,
                    ]) !!}
                    @error('point3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('end', '*Conclusion') !!}</strong>
                    {!! Form::textarea('end', $event->end, [
                    'placeholder' => 'Enter a conclusion',
                    'class' => 'form-control
                    tinyeditor',
                    'spellcheck' => 'true',
                    ]) !!}
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <img
                    src="{{ File::exists($event->getFirstMediaPath('event-collection', 'thumb')) ? $event->getFirstMediaUrl('event-collection', 'thumb') : 'https://via.placeholder.com/270x180.jpg?text=Upload+an+image' }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('file', 'File (Only JPEG images)') !!}</strong>
                    {!! Form::file('file', ['class' => 'form-control ' . (Session::get('error') ? ' is-invalid' : null) .
                    ($errors->has('file') ? 'is-invalid' : null), Session::get('error') ? 'autofocus' : null,
                    $errors->has('file') ? 'autofocus' : null]) !!}
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($message = Session::get('error'))
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {!! Form::button('Update', [
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'title' => 'Update',
                'style' => 'background-color:
                rgb(136, 101, 42); margin:20px;',
                ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @section('validationScripts')
        @include('admin.layouts.__includes.__validation_script')
    @endsection
</div>
@endsection
