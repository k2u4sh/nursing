@include('student.student-header')
@include('student.student-sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Exam Details</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="exam_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Exam Name</th>
                                                <th>Exam date</th>
                                                <th>Exam Time</th>
                                                <th>Exam Duration</th>
                                                <th>Marks Obtained</th>
                                                <th>Remarks</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$exam_details[0]->exam_name}}</td>
                                            <td>{{$exam_details[0]->exam_date}}</td>
                                            <td>{{$exam_details[0]->exam_time}}</td>
                                            <td>{{$exam_details[0]->duration}}</td>
                                            <td>{{$exam_details[0]->marks_obtained}}</td>
                                            <td>{{$exam_details[0]->remarks}}</td>
                                            <!-- <td>
                                                <div class="actions">
                                                    <a href="edit-teacher.html" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-sm red">
                                                        <i class="feather-trash"></i>
                                                    </a>
                                                </div>
                                            </td> -->
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('student.student-footer')
