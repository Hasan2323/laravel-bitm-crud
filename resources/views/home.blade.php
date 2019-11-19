@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome! You are logged in!</h1><br>
                        <form method="post" action="donors/search-result">

                            {!! csrf_field() !!}

                            <b>Blood Group:</b> <input type="text" size="30" placeholder="Example: B+" name="keyword" required>
                            <input type="submit" value="Search">

                        </form>
                    <br>

                    <a href="donors/create" class="btn btn-primary">Donor registration</a>
                    <a href="donors/index" class="btn btn-danger">Donor List</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
