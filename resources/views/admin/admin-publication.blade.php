@include('admin.inner-adminheader')

@include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Publication</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openPublicationModal" data-toggle="modal" data-target="#publicationModal">Add Publication</a>
                        <a class="btn btn-danger" onclick="deleteAllPublication()" id="delPublicationBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="publication_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll" /></th>
                                            <th>Publication Name</th>
                                            <th>Cover Page</th>
                                            <th>File Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($publicationData as $publication)
                                            <tr>
                                                <td><input type="checkbox" class="selectAll" name="selectAll" value="{{$publication->id}}"></td>
                                                <td>{{$publication->p_name}}</td>
                                                <td>{{$publication->p_cover_page}}</td>
                                                <td>{{$publication->p_fileName}}</td>
                                                <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" onclick="edit_publication('{{$publication->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_publication('{{$publication->id}}')" class="btn btn-sm red">
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
        <div class="modal fade" id="publicationModal" tabindex="-1" role="dialog" aria-labelledby="publicationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="publicationModalLabel">Add Publication</h5>
                <button type="button" id="publicationModalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="publication_form">
                    @csrf
                    <input type="hidden" name="p_id" id="p_id">
                    <div class="row">
                        <div class="form-group">
                            <label>Publication Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Enter Publication Name">
                            <span id="p_name_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Cover Page</label>
                            <input type="file" name="cover_page" id="cover_page" class="form-control" accept="image/*">
                            <span id="cover_page_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Publication Attachment</label>
                            <input type="file" name="p_fileName" id="p_fileName" class="form-control">
                            <span id="p_fileName_error" style="color:red"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" id="insert_publication">Add</button>
                <button type="submit" class="btn btn-primary" id="update_publication"></button>
            </div>
            </div>
        </div>
        </div>


@include('admin.inner-adminfooter')



