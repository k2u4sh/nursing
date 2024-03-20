@include('admin.inner-adminheader')
<style>
.toggleCms {float: left;margin-right: 10px;}   

.toggleCms .switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 30px;
}

.toggleCms .switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.toggleCms .slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.toggleCms .slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 2px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

.toggleCms input:checked + .slider {height: 30px;
  background-color: #2196F3;
}

.toggleCms input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

.toggleCms input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.toggleCms .slider.round {
  border-radius: 34px;
}

.toggleCms .slider.round:before {
  border-radius: 50%;
}
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
@include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Testimonial</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openNewModal" data-toggle="modal" data-target="#testimonialModal">Add Testimonial</a>
                        <a class="btn btn-danger" onclick="delAllTesti()" id="delTestiBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="testimonial_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="delAllTesti"></th>
                                            <!-- <th>Sr No.</th> -->
                                            <th>Title</th>
                                            <th>Rating</th>
                                            <th>Sumitted By</th>
                                            <th>Description</th>
                                            <!-- <th>Publish</th> -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($testimonial as $testi)
                                            <tr>
                                                <td><input type="checkbox" class="delAllTesti" name="delAllTesti" value="{{$testi->id}}"></td>
                                                <!-- <td>{{$testi->id}}</td> -->
                                                <td>{{$testi->title}}</td>
                                                <td>{{$testi->rating}}</td>
                                                <!-- <td>{{$testi->user_id?$testi->user->first_name.' '.$testi->user->last_name:$testi->name}}</td> -->
                                                <td>{{$testi->name}}</td>
                                                <td>{!!Str::of($testi->description)->limit(30)!!}</td>
                                                
                                                <td>
                                                <div class="toggleCms">
                                                    <label class="switch">
                                                        <input type="checkbox" class="testimonial_action" data-id="{{$testi->id}}" name="testi_name" id="testi_name" value="{{$testi->soft_delete == '0' ? '1' : '0'}}" {{$testi->soft_delete == '0' ? 'checked' : ''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                                    <div class="actions">
                                                    <a href="javascript:void(0);" onclick="view_testimonial('{{$testi->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_testimonial('{{$testi->id}}')" class="btn btn-sm red">
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
        <div class="modal fade" id="testimonialViewModal" tabindex="-1" role="dialog" aria-labelledby="testimonialViewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Testimonial</h5>
                        <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label>Title:&emsp;</label>
                                <span id="viewTitle"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Name:&emsp;</label>
                                <span id="viewName"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Occupation:&emsp;</label>
                                <span id="viewOccupation"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Rating:&emsp;</label>
                                <span id="viewRating"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Description: &emsp;</label>
                                <span id="viewDescription"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testimonialModalLabel">Add Testimonial</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                            <span id="title_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input class="form-control" type="text" name="testi_name1" id="testi_name1" placeholder="Please enter name">
                            <span id="testi_name1_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="testi_occu" id="testi_occu" placeholder="Please enter occupation">
                            <span id="testi_occu_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Rating</label>
                        </div>
                        <div class="form-group col-md-9">
                            <!-- <label>Rating</label> -->
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="testi_desc" id="testi_desc" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="insert_testi">Add</button>
                <button type="submit" class="btn btn-primary" id="update_testi"></button>
            </div>
            </div>
        </div>
        </div>

@include('admin.inner-adminfooter')


