<div class="row ">

    <div class="col-md-6 hidden">
        <div class="form-group">

            <input type="text" class="form-control" name="editid"  value="{{ $viewproduct['id'] }}" placeholder="Enter your first name">
            <input type="text" class="form-control" name="oldimage"  value="{{ $viewproduct['image'] }}" placeholder="Enter your first name">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Name </label>
            <input type="text" class="form-control" name="productname"  value="{{ $viewproduct['name'] }}" placeholder="Enter your first name">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Category</label>
            <select class="form-control" name="productcategory">
                <option value=""> Select Product Category </option>
                @for($i = 0 ; $i < count($category) ; $i++)
                <option value="{{ $category[$i]->id }}" {{ $category[$i]->id == $viewproduct['categoryid'] ? 'selected' : '' }}> {{ $category[$i]->category }} </option>
                @endfor
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Size</label>
            @for($i = 0 ; $i < 10 ; $i++)
            <input type="text" class="form-control productprice" name="productsize[]" value="{{ (isset($viewproductSizePrize[$i]->productsize))?$viewproductSizePrize[$i]->productsize:'' }}" placeholder="Product Size {{ $i + 1 }}">
            @endfor
            
           
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Price</label>
            @for($i = 0 ; $i < 10 ; $i++)
                <input type="text" class="form-control productprice" name="productprice[]" value="{{ (isset($viewproductSizePrize[$i]->productprize))?$viewproductSizePrize[$i]->productprize:''  }}" placeholder="Product Price {{ $i + 1}}">
            @endfor
            
        </div>
    </div>
    
<!--    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Product Price</label>
            <input type="text" class="form-control" name="productprice"  value="{{ $viewproduct['price'] }}" placeholder="Product Price">
        </div>
    </div>-->

    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label">Product Image</label>
            <div><br>
                <input type="file" class="form-control" name="productimage"><br>
                <img src="{{ url('public/images/product/'.$viewproduct['image'] ) }}" alt="contact-img" title="contact-img" class="rounded mr-4" height="100" />
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label">Product Description</label>
            <textarea type="text" class="form-control" name="productdescription" value="{{ $viewproduct['description'] }}" placeholder="Product Description">{{ $viewproduct['description'] }}</textarea>
        </div>
    </div>
</div>
