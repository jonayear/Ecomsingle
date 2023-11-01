@extends('user_template.layouts.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box_main">
                <div class="col-md-10">
                    <form method="" action="">
                      <div class="form-group">
                        <label for="phone_no">Phone Number</label>
                        <input type="number" class="form-control" id="phone_no" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="phone_no">
                      </div>
                      <div class="form-group">
                        <label for="city_name">City/Village Nmae</label>
                        <input type="text" class="form-control" id="city_name" aria-describedby="emailHelp" placeholder="Enter City Nmae" name="city_name">
                      </div>
                      <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" class="form-control" id="postal_code" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="postal_code">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<h2>Total Price:- {{ $totalprice }} </h2>
@endsection