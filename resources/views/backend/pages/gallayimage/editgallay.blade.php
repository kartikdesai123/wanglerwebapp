<div class="row ">
    <div class="col-md-12">
        <div class="form-group">
            <div>
                <img src="{{ url('public/images/gallay/'.$viewgallay['gallayimage'] ) }}" alt="Gallery_image" title="contact-img" class="rounded mr-4" height="100" />
                <br>
                <label class="form-label">Gallery Image</label>
                <input type="file" class="form-control" name="gallayimage"><br>
                <input type="text" class="form-control hidden" value="{{ $viewgallay['id'] }}" name="id"><br>
            </div>
        </div>
    </div>
</div>
