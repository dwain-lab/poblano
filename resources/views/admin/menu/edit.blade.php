@extends('admin.layouts.app')

@section('content')

<div class="container position-relative text-lg-left aos-init aos-animate">

    <div style="padding-top:3%">

        <a class="btn btn-primary" href="{{ route('menu.create') }}" title="Add New" style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
        </a>
        <a class="btn btn-primary" href="{{ route('menu.index') }}" title="Go Back" style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/></svg>
        </a>
    </div>
    <!-- Search form -->
    {{-- <div class="search-inline" style="width: 100%; display:grid"> --}}
        {{-- {!! Form::open(['route' => '', 'method' => 'get', 'class' => 'form-control form-control-search']) !!}
            {!! Form::text('search', null, ['class'=>'form-control form-control-margin', 'required' , 'placeholder=search']) !!}
            {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit','class'=>'btn btn-secondary']) !!}
        {!! Form::close() !!} --}}
    {{-- </div> --}}
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
    {!! Form::open(['route' => ['menu.update', $menu->id], 'method' => 'patch', 'files' => 'true']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{!! Form::label('dish', '*Dish Name') !!}</strong>
                {!! Form::text('dish', $menu->dish, ['placeholder'=>'Enter a Dish Name', 'class'=>'form-control', 'spellcheck'=>'true', 'required']) !!}
                @error('dish')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{!! Form::label('cost', '*Price') !!}</strong>
                {!! Form::text('cost', $menu->cost, ['placeholder'=>'Enter a price', 'class'=>'form-control', 'spellcheck'=>'true', 'required']) !!}
                @error('cost')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{!! Form::label('ingredients', '*Ingredients') !!}</strong>
                {!! Form::text('ingredients', $menu->ingredients, ['placeholder'=>'Enter an Ingredients', 'class'=>'form-control', 'spellcheck'=>'true'], 'required') !!}
                @error('ingredients')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{!! Form::label('category', '*Category') !!}</strong>
                {!! Form::select('menu_category_id', $categories, $menu->menu_category()->pluck('id')->implode(' '), ['class'=>'form-control', 'required']) !!}
                @error('category')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="{{ $menu->getFirstMediaUrl('menus-collection', 'thumb') }}" >
            {!! Form::file('file',['class' => 'form-control']); !!}
            @error('file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {!! Form::button('Update', ['type' => 'submit', 'class'=>'btn btn-primary', 'style'=>'background-color: rgb(136, 101, 42); margin:20px;', 'title'=>'Update']) !!}
            </div>
        </div>

    {!! Form::close() !!}
</div>
@endsection

