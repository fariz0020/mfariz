@extends('layouts.app')

@section('content')
    <div class="container">
      <form method="post" action="{{url('transaction')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <lable>Choose Saving</lable>
              <select id="id_saving" name="id_saving" class="form-control">
                  @foreach($savings as $saving)
                      <option value="{{ $saving->id }}">{{ $saving->no_saving }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <lable>Transaction Type</lable>
              <select id="id_type" name="id_type" class="form-control">
                  @foreach($types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="row benefNumb" style="display:none">
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
            <input class="form-control"  type="number" name="value">
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
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
