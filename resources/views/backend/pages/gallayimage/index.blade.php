@extends('backend.layout.app')
@section('content')
<div class="row">
    <!-- customar project  start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#addproductmodel"><i class="feather icon-plus"></i>Gallary Images</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="gallay-table" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Gallary Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--                            @for($i = 0 ; $i < 15 ; $i++)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $i+1 }}
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="{{ url('public/backend/assets/images/product/prod-1.jpg') }}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" />
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-check"></i></a>
                            
                                                            </td>
                            
                                                            <td class="table-action text-center">
                                                                <a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                                            </td>
                                                        </tr>
                            
                                                        @endfor
                            -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Edit Product model --> 
<div id="editmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gallary Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="editgallayform" action="{{ route('editgallay') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="editdiv">


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-primary">Edit Gallary Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>
<!--Add Product model --> 
<div id="addproductmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addproductmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Gallery Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="add-gallery" method="post" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Gallery Image</label>
                                <div><br>
                                    <input type="file" class="form-control validation-file" name="gallayimage"><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Add Gallary Image</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="statusmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="featuremodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Gallay Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure to change gallery status ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary yes-sure-status">Yes Change Gallery's status</button>
            </div>
        </div>
    </div>
</div> 
@endsection