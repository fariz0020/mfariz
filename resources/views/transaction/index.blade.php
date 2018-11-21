@extends('layouts.app')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md">
                <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            </div>

            <div class="col-md-10">
                <h2>Welcome, {{ Auth::user()->name }}</h2>
                <p>Email : {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <h3>Transaction</h3>
        <div class="row">
            <div class="card col-lg-4 text-center">
                <a href="#">
                    <div class="card-body">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Saving</h2>
                    </div>
                </a>
            </div><!-- /.col-lg-4 -->
            <div class="card col-lg-4 text-center">
                <a href="#">
                    <div class="card-body">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Withdraw</h2>
                    </div>
                </a>
            </div><!-- /.col-lg-4 -->
            <div class="card col-lg-4 text-center">
                <a href="#">
                    <div class="card-body">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Transfer</h2>
                    </div>
                </a>
            </div><!-- /.col-lg-4 -->
        </div>
    </div>
    <br />
    <div class="container">
        <h3>My Saving</h3>
        @foreach($savings as $saving)
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0">#{{ $saving->no_saving }}</h5>
                        Saldo Rp. {{ $saving->balance }}
                        <button type="button" class="btn btn-link">Detail</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br/>
@endsection
