@extends('admin.layouts.app')

@section('active_menu', 'active')

@section('content')
    <div class="container position-relative text-lg-left aos-init aos-animate">
        {{-- <div class="search-inline">
            <a class="btn btn-primary" href="{{ route('phone.create') }}" title="Add New Number"><svg width="1em"
                    height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path fill-rule="evenodd"
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
        </div> --}}
        <div style="padding-top:3%">

            {{-- <a class="btn btn-primary" href="{{ route('gallery.create') }}"
                title="Add New" style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
            </a> --}}
            <a class="btn btn-primary" href="{{ route('menu_category.index') }}" title="Go Back"
                style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                </svg>
            </a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => 'menu_category.store', 'method' => 'post']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('name', 'Name') !!}</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Enter a name', 'class' => 'form-control', 'spellcheck'
                    => 'true']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{!! Form::label('slug', 'Slug* (No space. Use dash to separate words)') !!}</strong>
                    {!! Form::text('slug', null, ['placeholder' => 'Enter a slug (No space. Use dash to separate words)',
                    'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {!! Form::button('Save', [
                'type' => 'submit',
                'class' => 'btn btn-primary',
                'style' => 'background-color:
                rgb(136, 101, 42); margin:20px;',
                'title' => 'Save',
                ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    {{--
    <script src="https://cdn.tiny.cloud/1/4hzpk0nf0c7okc8slescpg6wcqkxjo7mb3fl5u5nd3i81cx8/tinymce/5/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector: 'textarea.tinyeditor',
            browser_spellcheck: true,
        });

    </script> --}}
@endsection
