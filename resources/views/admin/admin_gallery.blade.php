@include('admin.inner-adminheader')
@include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Gallery</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openNewGalleryModal" data-toggle="modal" data-target="#galleryModal">Add Images</a>
                        <a class="btn btn-danger" onclick="delAllGallery()" id="delGalleryBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="gallery_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="delAllGallery"></th>
                                            <th>Category Name</th>
                                            <th>Gallery Image</th>
                                            <!-- <th>Alt Text</th> -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allgallaryData as $gallery)
                                        <tr>
                                            <td><input type="checkbox" name="delAllGallery" class="delAllGallery" value="{{$gallery->id}}"></td>
                                            <td>{{(DB::table('gallery_cat')->where('id',$gallery->cat_id)->first())->cat_name ?? ''}}</td>
                                            <td><img src="/upload/gallery/{{$gallery->image_name}}" style="width:70px"></td>
                                            <!-- <td>{{$gallery->img_alt}}</td> -->
                                            <td>
                                            <div class="actions">
                                                    <a href="javascript:void(0);" onclick="edit_gallery('{{$gallery->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_gallery('{{$gallery->id}}')" class="btn btn-sm red">
                                                        <i class="feather-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Add Gallery</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <select class="form-control select2" name="gal_cat" id="gal_cat">
                                <option value="">Select Category</option>
                                @foreach($gallery_cat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                            <span id="gal_cat_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row" id="gall_img">
                        <div class="form-group">
                            <label>Gallery Image</label>
                            <input type="file" name="gal_image" id="gal_image" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <span id="gal_image_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Image Alt</label>
                            <input type="text" name="img_alt" id="img_alt" class="form-control" placeholder="Please enter alt text">
                            <input type="hidden" name="gallry_id" id="gallry_id">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="insert_gallery">Add</button>
                <button type="submit" class="btn btn-primary" id="update_gallery"></button>
            </div>
            </div>
        </div>
        </div>

@include('admin.inner-adminfooter')


