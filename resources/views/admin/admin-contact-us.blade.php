@include('admin.inner-adminheader')
@include('admin.admin_sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Contact Us</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="department_table">
                                        <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contactdata as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->mobile}}</td>
                                            <td>{{Str::of($contact->message)->limit(30)}}</td>
                                            <td>
                                                <div class="actions">
                                                    <a onclick="open_Form_detail('{{$contact->id}}')" class="btn btn-sm red">
                                                        <i class="feather-eye"></i>
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
<div class="modal fade" id="contactUsModal" tabindex="-1" role="dialog" aria-labelledby="contactUsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactUsModalLabel">Contact Us Detail</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="appendDetail">

            </div>

            </div>
        </div>
        </div>
@include('admin.inner-adminfooter')
