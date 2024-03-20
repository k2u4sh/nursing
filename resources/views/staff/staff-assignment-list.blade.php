@include('staff.staff-header')
@include('staff.staff-sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Assignment Upload List</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="assignment_list">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Assignment Name</th>
                                                <th>Assgined To</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignmentData as $assignment)
                                        <tr>
                                            <td>{{$assignment->id}}</td>
                                            <td>{{$assignment->assignment_name}}</td>
                                            <td>Mohd</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="/upload/staff-assignment/{{$assignment->assignment_name}}" class="btn-btn-sm red" target="_blank"><i class="feather-eye"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <select class="form-control select2 assignment_action_class" data-id="{{$assignment->id}}" name="assignment_action" id="assignment_action">
                                                    <option value="pending" {{$assignment->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                                    <option value="completed" {{$assignment->status == 'completed' ? 'selected' : ''}}>Compeleted</option>
                                                    <option value="ongoing" {{$assignment->status == 'ongoing' ? 'selected' : ''}}>Ongoing</option>
                                                </select>
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
@include('staff.staff-footer')
