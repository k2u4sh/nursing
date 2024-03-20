@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('flash-msg')
                <form class="form-horizontal" action="{{ url('admin-contact-store') }}" method="post">
                    @csrf
                    <input type="hidden" name="second_contact_us_id" value="{{ $second_contact_us->id ?? '' }}">

                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email <span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $second_contact_us->email ?? '') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">phone <span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $second_contact_us->phone ?? '') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address <span style="color:red">*</span></label>
                        <textarea name="address" id="address" rows="3" class="form-control" > {!! $second_contact_us->address ?? '' !!}  </textarea>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-12" style="margin-top: 28px;">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin.inner-adminfooter')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
