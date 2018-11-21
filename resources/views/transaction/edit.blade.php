@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{action('TransactionController@update', $id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Choose Saving</lable>
                    <select id="id_saving" name="id_saving" class="form-control">
                        <option value="{{ $transaction->savingx()->first()->id }}">{{ $transaction->savingx()->first()->no_saving }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Transaction Type</lable>
                    <select id="id_type" name="id_type" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" @if($transaction->id_type == $type->id) selected @endif>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row benefNumb" @if($transaction->id_type != 3)style="display:none"@endif>
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="BenefNumb">No. Rekening Penerima:</label>
                    <input type="number" maxlength="12" class="form-control" name="BenefNumb">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <strong>Value : </strong>
                    <input class="form-control"  type="number" name="value" value="{{ $transaction->value }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select#id_type').on('change', function () {
                if (this.value == 3) {
                    $('.benefNumb').show()
                } else {
                    $('.benefNumb').hide()
                }
            });
        });
    </script>
@endpush
