<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div>
				<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Select City </label>
                                <select name="city_id" class="form-control">
									<option value=""> Select City </option>
									@foreach($getCityLists as $getCityList)
									<option value="{{ $getCityList->id }}" {{ $getCityList->id == $viewseller['city_id'] ? 'selected' : ''  }} > {{ $getCityList->cityname }}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Store Name </label>
                                <input type="text" class="form-control" name="sellername" value="{{ $viewseller['sellername'] }}"  placeholder="Enter your seller name">
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Store Address </label>
                                <input type="text" class="form-control" name="selleraddress" value="{{ $viewseller['selleraddress'] }}"  placeholder="Enter your seller address">
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Store Phone </label>
                                <input type="text" class="form-control" name="sellerphone"  value="{{ $viewseller['sellerphoneno'] }}" placeholder="Enter your seller phone">
                            </div>
                        </div>
                    </div>
                
                <input type="text" class="form-control hidden" value="{{ $viewseller['id'] }}" name="id"><br>
            </div>
        </div>
    </div>
</div>
