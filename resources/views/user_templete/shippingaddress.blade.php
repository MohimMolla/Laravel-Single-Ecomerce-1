@extends('user_templete.layouts.user_profile_template')
@section('userprofile')
<h1>Provide Your Shipping Information</h1>
<div class="row">
	<div class="col-12">
					<div class="box_main">
						<form action="{{route('storeshippingaddress')}}" method="POST">
							@csrf
							<div class="form-group">
								<label for="phone_number">Phone Number</label>
								<input class="form-control" type="text" name="phone_number">
							</div>
							<div class="form-group">
								<label for="city_name">City/Village Name</label>
								<input class="form-control" type="text" name="city_name">
							</div>
							<div class="form-group">
								<label for="postal_code">Postal Code</label>
								<input class="form-control" type="text" name="postal_code">
							</div>
							
							<input type="submit" value="Next" class="btn btn-outline-primary" name="" id="">
						</form>
					</div>
	</div>
</div>

@endsection