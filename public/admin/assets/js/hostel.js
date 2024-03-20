$(document).ready(function(){
    $('#update_hostel').hide();
    $('#modalClose').click(function(){
        $('#hostelModal').modal('hide');
    });
    //select all hostel
    // $('#delAllHostel').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#hostel_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    $('#delHostelBtn').hide();
    $('.delAllHostel').on('change',function() {
        var checkedCheckboxes = [];
        $(".delAllHostel").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delHostelBtn').show();
        else
        $('#delHostelBtn').hide();
    });
    $('#delAllHostel').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#hostel_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".delAllHostel").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delHostelBtn').show();
        else
        $('#delHostelBtn').hide();
    });
    //open new modal
    $('#openHostelModal').click(function(){
        $('#hostelModalLabel').html('Add Hostel');
        $('#insert_hostel').html('Add').show();
        $('#update_hostel').hide();
        var htm = '<option value="">Select Occupancy</option>'
                        +'<option value="2">Double Occupancy</option>'
                        +'<option value="3">Triple Occupancy</option>'
                        +'<option value="4">Quadruple Occupancy</option>';
        $('#occu_type').html(htm);
        $('#no_room').val('');
        $('#avail_seat').val('');
        $('#security_deposite').val('');
        $('#hostel_fee').val('');
        $('#emptyDescription').empty();
        $('#emptyInformation').empty();
        var htm1 = '<div class="form-group col-md-6"><label>Room Description</label><textarea name="room_desc" id="room_desc" rows="3" class="form-control"></textarea></div>'
                    +'<div class="form-group col-md-6"><label>Recent Publications</label><textarea name="recent_publication" id="recent_publication" rows="3" class="form-control"></textarea></div>';
        var htm2 = '<div class="form-group"><label>Hostel Information</label><textarea class="form-control" id="hostel_info" name="hostel_info"></textarea></div>';
        $('#emptyDescription').html(htm1);
        $('#emptyInformation').html(htm2);
        CKEDITOR.replace('room_desc');
        CKEDITOR.replace('recent_publication');
        CKEDITOR.replace('hostel_info');
    });
    //update hostel
    $('#update_hostel').click(function(){
        var hostel_id = $('#hostel_id').val();
        var occu_type = $('#occu_type').val();
        var room_image = $('#room_image')[0].files;
        var no_room = $('#no_room').val();
        var avail_seat = $('#avail_seat').val();
        var security_deposite = $('#security_deposite').val();
        var hostel_fee = $('#hostel_fee').val();
        var room_desc = CKEDITOR.instances['room_desc'].getData();
        var recent_publication = CKEDITOR.instances['recent_publication'].getData();
        var hostel_info = CKEDITOR.instances['hostel_info'].getData();
        $('#occu_type_error').html('');
        if(occu_type == '')
        {
            $('#occu_type_error').html('Please choose Occupacy Type');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('occu_type',occu_type);
        fd.append('id',hostel_id);
        if(room_image[0] != undefined)
        fd.append('room_image',room_image[0]);
        if(no_room != '')
        fd.append('no_room',no_room);
        if(avail_seat != '')
        fd.append('avail_seat',avail_seat);
        if(security_deposite != '')
        fd.append('security_deposite',security_deposite);
        if(hostel_fee != '')
        fd.append('hostel_fee',hostel_fee);
        if(room_desc != '')
        fd.append('room_desc',room_desc);
        if(recent_publication != '')
        fd.append('recent_publication',recent_publication);
        if(hostel_info != '')
        fd.append('hostel_info',hostel_info);
        $.ajax({
            url: '/admin-hostel-update',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Hostel Updated Successfully');
                    window.location.reload();
                }
            }
        });
    });
    //insert hostel
    $('#insert_hostel').click(function(){
        var occu_type = $('#occu_type').val();
        var room_image = $('#room_image')[0].files;
        var no_room = $('#no_room').val();
        var avail_seat = $('#avail_seat').val();
        var security_deposite = $('#security_deposite').val();
        var hostel_fee = $('#hostel_fee').val();
        // var room_desc = $('#room_desc').val();
        // var recent_publication = $('#recent_publication').val();
        // var hostel_info = $('#hostel_info').val();
        var room_desc = CKEDITOR.instances['room_desc'].getData();
        var recent_publication = CKEDITOR.instances['recent_publication'].getData();
        var hostel_info = CKEDITOR.instances['hostel_info'].getData();
        $('#occu_type_error').html('');
        if(occu_type == '')
        {
            $('#occu_type_error').html('Please choose Occupacy Type');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('occu_type',occu_type);
        if(room_image[0] != undefined)
        fd.append('room_image',room_image[0]);
        if(no_room != '')
        fd.append('no_room',no_room);
        if(avail_seat != '')
        fd.append('avail_seat',avail_seat);
        if(security_deposite != '')
        fd.append('security_deposite',security_deposite);
        if(hostel_fee != '')
        fd.append('hostel_fee',hostel_fee);
        if(room_desc != '')
        fd.append('room_desc',room_desc);
        if(recent_publication != '')
        fd.append('recent_publication',recent_publication);
        if(hostel_info != '')
        fd.append('hostel_info',hostel_info);
        $.ajax({
            url: '/admin-hostel',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Hostel Added Successfully');
                    window.location.reload();
                }
            }
        });
    });
});
function edit_hostel(id)
{
    $('#hostelModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-edit-hostel',
        data: {'id':id},
        method: "GET",
        success: function(data)
        {
            console.log(data);
            if(data.status == 'success')
            {
                $('#hostel_id').val(id);
                $('#hostelModalLabel').html('Update Hostel');
                $('#insert_hostel').hide();
                $('#update_hostel').html('Update').show();
                if(data.data['occupacy_type'] == 2)
                var selected2 = 'selected';
                else if(data.data['occupacy_type'] == 3)
                var selected3 = 'selected';
                else if(data.data['occupacy_type'] == 4)
                var selected4 = 'selected';
                var htm = '<option value="2" '+selected2+'>Double Occupancy</option>'
                        +'<option value="3" '+selected3+'>Triple Occupancy</option>'
                        +'<option value="4" '+selected4+'>Quadruple Occupancy</option>';
                $('#occu_type').html(htm);
                $('#no_room').val(data.data['no_of_room']);
                $('#avail_seat').val(data.data['seat_available']);
                $('#security_deposite').val(data.data['security_deposite']);
                $('#hostel_fee').val(data.data['hostel_fee']);
                $('#emptyDescription').empty();
                $('#emptyInformation').empty();
                var htm1 = '<div class="form-group col-md-6"><label>Room Description</label><textarea name="room_desc" id="room_desc" rows="3" class="form-control">'+data.data['room_desc']+'</textarea></div>'+
                            '<div class="form-group col-md-6"><label>Recent Publications</label><textarea name="recent_publication" id="recent_publication" rows="3" class="form-control">'+data.data['recent_publication']+'</textarea></div>';
                var htm2 = '<div class="form-group"><label>Hostel Information</label><textarea class="form-control" id="hostel_info" name="hostel_info">'+data.data['hostel_info']+'</textarea></div>';
                $('#emptyInformation').html(htm2);
                $('#emptyDescription').html(htm1);
                CKEDITOR.replace('room_desc');
                CKEDITOR.replace('recent_publication');
                CKEDITOR.replace('hostel_info');
            }
        }
    });
}
function delete_hostel(id)
{
    if(confirm('Are you sure to delete hostel?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-hostel',
            method: 'POST',
            data: {'id':id},
            success: function(data)
            {
                // console.log(data)
                if(data.status == 'success')
                {
                    alert('Hostel Deleted Successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function delAllHostel()
{
    var deleteAll = [];
    $("input:checkbox[name=delAllHostel]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete hostels?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-hostel',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Hostels deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
