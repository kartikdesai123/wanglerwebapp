<div class="row ">
    <div class="col-md-12">
        <div class="form-group">
            <div>
                <img src="{{ url('public/images/silder/'.$viewsilder['silderimage'] ) }}" alt="silder_image" title="contact-img" class="rounded mr-4" height="100" />
                <br>
                <label class="form-label">Silder Image</label>
                <input type="file" class="form-control" name="silderimage"><br>
                <input type="text" class="form-control hidden" value="{{ $viewsilder['id'] }}" name="id"><br>
            </div>
        </div>
    </div>
</div>
