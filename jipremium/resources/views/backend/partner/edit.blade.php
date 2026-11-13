@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
    <a href="{{ route('partners.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Sorry</strong> Error Input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('partners.update',$partners->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Partner Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" name="name" placeholder="name" value="{{ $partners->name }}">
                            <br>
                            <button type="submit" class="btn btn-lg btn-primary">Submit <i data-feather="chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
