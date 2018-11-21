@extends('layouts.app')

@section('content')
    <div class="container">
        <center>
        <div class="ct-chart ct-perfect-fourth" style="width: 400px;"></div>
        </center>

        <div class="container">

            <div id="accordion">

                <table class="table" cellspacing="0" role="grid">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Transaction</th>
                        <th>Value</th>
                        <th>Description</th>
                        <th>Datetime</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$transaction->type()->first()->name}}</td>
                            <td>{{ number_format($transaction['value'])}}</td>
                            <td>{{$transaction['description']}}</td>
                            <td>{{$transaction->created_at}}</td>

                            <td><a href="{{action('TransactionController@edit', $transaction->id)}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{action('TransactionController@destroy', $transaction->id)}}" method="post">
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

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $.get('/api/chart/' +{!! $id !!}, function (data) {
                data = {
                    labels: ['Saving', 'Withdraw', 'Transfer'],
                    series: [data.countSaving, data.countWithdraw, data.countTransfer]
                }
                console.log(data);

                var options = {
                    labelInterpolationFnc: function(value) {
                        return value[0]
                    }
                };

                var responsiveOptions = [
                    ['screen and (min-width: 640px)', {
                        chartPadding: 30,
                        labelOffset: 100,
                        labelDirection: 'explode',
                        labelInterpolationFnc: function(value) {
                            return value;
                        }
                    }],
                    ['screen and (min-width: 1024px)', {
                        labelOffset: 80,
                        chartPadding: 20
                    }]
                ];

                new Chartist.Pie('.ct-chart', data, options, responsiveOptions);
            });

        });

    </script>
    @endpush
@endsection

