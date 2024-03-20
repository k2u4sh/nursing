@include('admin.inner-adminheader')

        @include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">About Us</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-2 col-sm-12 col-12 d-flex">
                            <label>About Us Title</label>
                        </div>
                        <div class="col-xl-10 col-sm-12 col-12 d-flex">
                            <input type="text" name="aboutTitle" id="aboutTitle" class="form-control" placeholder="Enter About Us Title" value="{{$aboutData->title?$aboutData->title:''}}">
                        </div>
                    </div><br>
                    <div class="row">
                    <div class="col-xl-2 col-sm-12 col-12 d-flex">
                        <label>About Us Contents</label>
                    </div>
                        <div class="col-xl-10 col-sm-12 col-12 d-flex">
                            <div class="card bg-comman w-100">
                                <textarea rows="3" name="aboutus" id="aboutus" class="form-control">{{$aboutData->contents?$aboutData->contents:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-2 col-sm-6 col-12 d-flex">
                        <label>Banner Image</label>
                    </div>
                    <div class="col-xl-7 col-sm-6 col-12 d-flex">
                        <input type="file" name="about_banner" id="about_banner" class="form-control">
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        @if($aboutData->banner_image)
                            <img src="/upload/aboutus/{{$aboutData->banner_image}}" style="width:200px">
                        @endif
                    </div>
                    </div><br>
                    <div class="row">
                    <div class="col-xl-2 col-sm-6 col-12 d-flex">
                        <label>Side Image</label>
                    </div>
                    <div class="col-xl-7 col-sm-6 col-12 d-flex">
                        <input type="file" name="side_image" id="side_image" class="form-control">
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        @if($aboutData->side_image)
                            <img src="/upload/aboutus/{{$aboutData->side_image}}" style="width:200px">
                        @endif
                    </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-2 col-sm-6 col-12 d-flex">
                        <label>Objectives</label>
                        </div>
                        <div class="col-xl-10 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                                <textarea rows="3" name="objective" id="objective" class="form-control">{{$aboutData->objectives?$aboutData->objectives:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2 col-sm-6 col-12 d-flex">
                            <label>Objective Image</label>
                        </div>
                        <div class="col-xl-7 col-sm-6 col-12 d-flex">
                            <input type="file" name="objectiveFile" id="objectiveFile" class="form-control">
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        @if($aboutData->objective_image)
                            <img src="/upload/aboutus/{{$aboutData->objective_image}}" style="width:200px">
                        @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-2 col-sm-6 col-12 d-flex">
                            <label>Philosophy</label>
                        </div>
                        <div class="col-xl-10 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <textarea name="philosophy" id="philosophy" class="form-control">{{$aboutData->philosophy}}</textarea>
                        </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-2 col-sm-6 col-12 d-flex">
                            <label>Principal Image</label>
                        </div>
                        <div class="col-xl-7 col-sm-6 col-12 d-flex">
                            <input type="file" name="principal_image" id="principal_image" class="form-control">
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        @if($aboutData->principal_image)
                            <img src="/upload/aboutus/{{$aboutData->principal_image}}" style="width:200px">
                        @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-2 col-sm-6 col-12 d-flex">
                            <label>Principal Message</label>
                        </div>
                        <div class="col-xl-10 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <textarea rows="3" name="princi_msg" id="princi_msg" class="form-control">{{$aboutData->princi_msg}}</textarea>
                        </div>
                        </div>
                    </div>
                    <button type="submit" id="update_about" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        @include('admin.inner-adminfooter')
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            $(document).ready(function(){
                    make_ckediter();
                });

                function make_ckediter()
                {
                    $("textarea").each(function(_, ckeditor) {
                        var $ckfield = CKEDITOR.replace(ckeditor);

                        $ckfield.on('change', function() {
                            $ckfield.updateElement();
                        });
                    });

                }
        </script>
        <script>
            $(document).ready(function(){
                $('#update_about').click(function(){
                    var aboutTitle = $('#aboutTitle').val();
                    var about_banner = $('#about_banner')[0].files;
                    var side_image = $('#side_image')[0].files;
                    var aboutus = $('#aboutus').val();
                    var objective = $('#objective').val();
                    var objectiveFile = $('#objectiveFile')[0].files;
                    var philosophy = $('#philosophy').val();
                    var principal_image = $('#principal_image')[0].files;
                    var princi_msg = $('#princi_msg').val();
                    if(aboutTitle == '')
                    {
                        alert('Please enter title');
                        return false;
                    }
                    // if(about_banner[0] == undefined)
                    // {
                    //     alert('Please browse banner image');
                    //     return false;
                    // }
                    // if(side_image[0] == undefined)
                    // {
                    //     alert('Please browse side image');
                    //     return false;
                    // }
                    if(aboutus == '')
                    {
                        alert('Please add aboutus contents');
                        return false;
                    }
                    // alert(about_banner[0]);return false;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var fd = new FormData();
                    fd.append('aboutTitle', aboutTitle);
                    if(about_banner[0]){
                        fd.append('about_banner', about_banner[0]);
                    }
                    if(side_image[0]){
                        fd.append('side_image', side_image[0]);
                    }
                    if(objectiveFile[0])
                    {
                        fd.append('objectiveFile',objectiveFile[0]);
                    }
                    if(philosophy != '')
                    {
                        fd.append('philosophy', philosophy);
                    }
                    if(principal_image[0])
                    {
                        fd.append('principal_image',principal_image[0]);
                    }
                    if(princi_msg != '')
                    {
                        fd.append('princi_msg',princi_msg);
                    }
                    fd.append('aboutus', aboutus);
                    fd.append('objective',objective);
                    $.ajax({
                        url: "{{ route('admin_aboutus_update') }}",
                        dataType: "json",
                        processData: false,
                        cache : false,
                        contentType: false,
                        data: fd,
                        method:"POST",
                        success:function(data){
                            console.log(data);
                            if(data.status == 'success')
                            {
                                alert('About Us Updated Successfully');
                                window.location.reload();
                            }
                        }
                    });
                    // alert(about_banner[0]);return false;
                    // {{ route('admin_aboutus_update') }}
                });
            });
        </script>
