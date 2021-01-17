@if ($search = Session::get('search'))
    <div class="alert alert-success">
        <p>{{ $search }} records returned successfully</p>
    </div>
@endif

@if (!is_null($search) && $search == 0)
    <div class="alert alert-warning">
        <p>{{ $search }} records returned</p>
    </div>
@endif


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    <script>
        alertify.set('notifier', 'position', 'top-center');
        alertify.set('notifier', 'delay', 10);
        alertify.success('{{ $message }}');

    </script>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
    <script>
        alertify.set('notifier', 'position', 'top-center');
        alertify.set('notifier', 'delay', 10);
        alertify.warning('{{ $message }}');

    </script>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    <script>
        alertify.set('notifier', 'position', 'top-center');
        alertify.set('notifier', 'delay', 10);
        alertify.error('{{ $message }}');

    </script>
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
    <script>
        alertify.set('notifier', 'position', 'top-center');
        alertify.set('notifier', 'delay', 8);
        alertify.error('Whoops! There were problems with your input. Please check the form.');

    </script>
@endif
