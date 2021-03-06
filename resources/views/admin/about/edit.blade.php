@extends('admin.layouts.app')

@section('active_about', 'active')

@section('scriptHead')
    @include('admin.layouts.__includes.__tinyeditor')
    @include('admin.layouts.__includes.__validation')
    @include('admin.layouts.__includes.__alerty')
@endsection

@section('content')

    @include('admin.layouts.__includes.__error_display')

    <div class="container position-relative text-lg-left aos-init aos-animate">

        <div style="padding-top:3%">

            <a class="btn btn-primary"
               href="{{ route('about.create') }}"
               title="Add New"
               style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg xmlns="http://www.w3.org/2000/svg"
                     width="20"
                     height="20"
                     fill="currentColor"
                     class="bi bi-plus-circle-fill"
                     viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
            </a>
            <a class="btn btn-primary"
               href="{{ route('about.index') }}"
               title="Go Back"
               style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg"
                     width="20"
                     height="20"
                     fill="currentColor"
                     class="bi bi-backspace-fill"
                     viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                </svg>
            </a>
        </div>
        <!-- Search form -->
        {{-- <div class="search-inline"
             style="width: 100%; display:grid">
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
        {!! Form::open(['route' => ['about.update', $about->id], 'method' => 'patch', 'id' => 'editForm']) !!}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('heading', 'Heading') !!}</strong>
                    {!! Form::text('heading', $about->heading, ['placeholder' => $about->heading, 'class' => 'form-control',
                    'spellcheck' => 'true', $errors->has('heading') ? 'autofocus' : null]) !!}
                    @error('heading')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('intro', 'Introduction') !!}</strong>
                    {!! Form::textarea('intro', $about->intro, ['placeholder' => strip_tags($about->intro), 'class' =>
                    'form-control', 'spellcheck' => 'true', $errors->has('intro') ? 'autofocus' : null]) !!}
                    @error('intro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point1', 'Point 1') !!}</strong>
                    {!! Form::text('point1', $about->point1, ['placeholder' => $about->point1, 'class' => 'form-control',
                    'spellcheck' => 'true', $errors->has('point1') ? 'autofocus' : null]) !!}
                    @error('point1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point2', 'Point 2') !!}</strong>
                    {!! Form::text('point2', $about->point2, ['placeholder' => $about->point2, 'class' => 'form-control',
                    'spellcheck' => 'true', $errors->has('point2') ? 'autofocus' : null]) !!}
                    @error('point2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('point3', 'Point 3') !!}</strong>
                    {!! Form::text('point3', $about->point3, ['placeholder' => $about->point3, 'class' => 'form-control',
                    'spellcheck' => 'true', $errors->has('point3') ? 'autofocus' : null]) !!}
                    @error('point3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('end', 'Conclusion') !!}</strong>
                    {!! Form::textarea('end', $about->end, ['placeholder' => strip_tags($about->end), 'class' =>
                    'form-control', 'spellcheck' => 'true', $errors->has('end') ? 'autofocus' : null]) !!}
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {!! Form::button('Update', [
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'style' => 'background-color:
                rgb(136, 101, 42); margin:20px;',
                'title' => 'Update',
                ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @section('validationScripts')
        @include('admin.layouts.__includes.__validation_script')
    @endsection
</div>
@endsection
