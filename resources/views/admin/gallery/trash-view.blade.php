@extends('admin.layouts.app')


<div class="container">

    @section('content')

        {{-- @if ($search = Session::get('search'))
        <div class="alert alert-success">
            <p>{{ $search }} records returned successfully</p>
        </div>
        @endif

        @if(!is_null ($search) && $search == 0)
        <div class="alert alert-warning">
            <p>{{ $search }} records returned</p>
        </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
{{--
        <div class="container position-relative text-lg-left aos-init aos-animate">

            <div style="padding-top:3%">

                <a class="btn btn-primary" href="{{ route('gallery.create') }}" title="Add New" style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                </a>
                <a class="btn btn-primary" href="{{ route('gallery.index') }}" title="Go Back" style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/></svg>
                </a>
            </div>
            <!-- Search form -->
            <div class="search-inline" style="width: 100%; display:grid">
                {!! Form::open(['route' => '', 'method' => 'get', 'class' => 'form-control form-control-search']) !!}
                    {!! Form::text('search', null, ['class'=>'form-control form-control-margin', 'required' , 'placeholder=search']) !!}
                    {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit','class'=>'btn btn-secondary']) !!}
                {!! Form::close() !!}
            </div> --}}

        </div>

        <div class="container">

            <table class="table table-bordered table-responsive-lg">
            <tr>
                {{-- <th>No</th> --}}
                <th> @sortablelink('name' , 'Image Name') </th>
                <th> @sortablelink('updated_at', 'Date Deleted') </th>
                <th> Image </th>
                <th width="250px">Action</th>
            </tr>
            @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->name }}</td>
                    <td>{{ $gallery->updated_at->diffForHumans() }}</td>
                    <td style="text-align: center;"> <img src="{{ $gallery->getFirstMediaUrl('gallery-collection', 'thumb') }}" > </td>
                    <td >
                            {!! Form::open(['route' => ['gallery.trashRestore', $gallery->id], 'method' => 'post']) !!}
                                {{-- <a href="{{ route('phone.show', $phone->id) }}" title="show" class="crud-spacing">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a> --}}
                                {{-- <a href="{{ route('gallery.edit', $gallery->id) }}" class="crud-spacing">
                                    <i class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></i>
                                </a> --}}
                            {!! Form::button('<i class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-folder-symlink-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3zM2.19 3c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293L7.586 3H2.19zm9.608 5.271l-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z"/>
                                  </svg></i>', ['type' => 'submit', 'onclick' => 'return confirm(\'Are you sure you want to delete gallery '. $gallery->name.'?\')', 'style' => 'border: none; background-color:transparent;', 'title'=>'Restore File', 'class' => 'crud_spacing']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['gallery.trashDestroy', $gallery->id], 'method' => 'post']) !!}
                                    {!! Form::button('<i class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></i>', ['type' => 'submit', 'onclick' => 'return confirm(\'Are you sure you want to delete gallery '. $gallery->name.'?\')', 'style' => 'border: none; background-color:transparent;', 'title'=>'Permanently Delete File', 'class' => 'crud_spacing']) !!}
                            {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </table>

            {!! $galleries->appends(\Request::except('page'))->render('pagination::bootstrap-4') !!}
        </div>
    @endsection

</div>
