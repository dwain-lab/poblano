@extends('admin.layouts.app')

<div class="container">

    @section('content')

    @if ($search = Session::get('search'))
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
@endif

        <div class="container position-relative text-lg-left aos-init aos-animate">

            <div style="padding-top:3%">

                <a class="btn btn-primary" href="{{ route('about.create') }}" title="Add New" style="background-color: rgb(136, 101, 42); hover:opacity:30%"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                </a>
                <a class="btn btn-primary" href="{{ route('about.index') }}" title="Go Back" style="background-color: rgb(136, 101, 42)"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
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

        </div>

        <div class="container">

            <table class="table table-bordered table-responsive-lg">
            <tr>
                {{-- <th>No</th> --}}
                <th> @sortablelink('heading' , 'Heading') </th>
                <th> @sortablelink('intro', 'Introduction') </th>
                <th> @sortablelink('point1' , 'Point 1') </th>
                <th> @sortablelink('point2', 'Point 2') </th>
                <th> @sortablelink('point3' , 'Point 3') </th>
                <th> @sortablelink('end', 'Conclusion') </th>
                <th> @sortablelink('updated_at' , 'Date Updated') </th>
                <th width="250px">Action</th>
            </tr>
            @foreach ($abouts as $about)
                <tr>
                    <td>{{ $about->heading }}</td>
                    <td>{{ $about->intro }}</td>
                    <td>{{ $about->point1 }}</td>
                    <td>{{ $about->point2 }}</td>
                    <td>{{ $about->point3 }}</td>
                    <td>{{ $about->end }}</td>
                    <td>{{ $about->updated_at->diffForHumans() }}</td>
                    <td>
                            {!! Form::open(['route' => ['about.destroy', $about->id], 'method' => 'post']) !!}
                                {{-- <a href="{{ route('phone.show', $phone->id) }}" title="show" class="crud-spacing">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a> --}}
                                <a href="{{ route('about.edit', $about->id) }}" class="crud-spacing">
                                    <i class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></i>
                                </a>

                            @method('DELETE')
                                {!! Form::button('<i class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg></i>', ['type' => 'submit', 'onclick' => 'return confirm(\'Are you sure you want to delete: '. $about->heading.'?\')', 'style' => 'border: none; background-color:transparent;', 'title'=>'Delete']) !!}
                            {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </table>

            {!! $abouts->appends(\Request::except('page'))->render('pagination::bootstrap-4') !!}
        </div>
    @endsection

</div>
