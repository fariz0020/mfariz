@extends('layouts.app')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="container">
        <div class="container">
            <div id="accordion">
                @foreach($savings as $saving)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    #{{ $saving->no_saving  }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Type</th>
                                            <th>Saldo</th>
                                            <th>Filename</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($nasabahs as $nasabah)
                                            @php
                                                $date=date('Y-m-d', $nasabah['date']);
                                            @endphp
                                            <tr>
                                                <td>{{$nasabah['id']}}</td>
                                                <td>{{$nasabah['name']}}</td>
                                                <td>{{$nasabah['email']}}</td>
                                                <td>{{$nasabah['number']}}</td>
                                                <td>{{$nasabah['tipe']}}</td>
                                                <td>{{ number_format($nasabah['saldo'])}}</td>
                                                <td>{{$nasabah['filename']}}</td>

                                                <td><a href="{{action('TransactionController@edit', $nasabah['id'])}}" class="btn btn-warning">Edit</a></td>
                                                <td>
                                                    <form action="{{action('TransactionController@destroy', $nasabah['id'])}}" method="post">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
