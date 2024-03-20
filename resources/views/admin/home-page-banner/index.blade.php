@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('flash-msg')
                
                <h3 class="mb-4">Home Page</h3>

                <div class="card">
                    <div class="card-body">
                        <?php  /*
                        <!-- <form class="form-horizontal" action="{{ $homePageBanner && $homePageBanner->id ? route('home-page-banners.update', ['home_page_banner' => $homePageBanner->id]) : route('home-page-banners.store') }}" method="post" enctype="multipart/form-data"> -->
                        */  ?>

                        @if($homePageBanner && $homePageBanner->id)
                            <form class="form-horizontal" action="{{ route('home-page-banners.update', ['home_page_banner' => $homePageBanner->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form class="form-horizontal" action="{{ route('home-page-banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        @endif
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="">First Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="title_1" value="{{ $homePageBanner->title_1 ?? '' }}" placeholder="Enter First Title">
                                    @if ($errors->has('title_1'))
                                        <span class="text-danger">{{ $errors->first('title_1') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="">Second Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="title_2" value="{{ $homePageBanner->title_2 ?? '' }}" placeholder="Enter Second Title">
                                    @if ($errors->has('title_2'))
                                        <span class="text-danger">{{ $errors->first('title_2') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" rows="3" class="form-control"> {!! $homePageBanner->description ?? '' !!} </textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label col-sm-2" for="">Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="image" class="form-control">
                                        <span>{{ $homePageBanner->image ?? '' }}</span>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                @if($homePageBanner && $homePageBanner->image)
                                    <img src="{{ asset('images/'.$homePageBanner->image ) }}" width="100px" height="75px" alt="image">
                                @else
                                    No available image
                                @endif
                                </div>
                            </div>

                            <div class="form-group">
                            </div>

                            <?php /*
                            <!-- <div class="row">
                                <h6>Strip</h6>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="">Expert Staff</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="" name="staff" value="{{ $homePageBanner->staff ?? '' }}" placeholder="">
                                            @if ($errors->has('staff'))
                                                <span class="text-danger">{{ $errors->first('staff') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="">Departments</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="" name="department" value="{{ $homePageBanner->department ?? '' }}" placeholder="">
                                            @if ($errors->has('department'))
                                                <span class="text-danger">{{ $errors->first('department') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="">Modern Facilities</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="" name="facility" value="{{ $homePageBanner->facility ?? '' }}" placeholder="">
                                            @if ($errors->has('facility'))
                                                <span class="text-danger">{{ $errors->first('facility') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            */ ?>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
       


