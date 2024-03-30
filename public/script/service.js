function changeStatus(service_id){
    $.ajax({
        url: '/services/change_status',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {service_id: service_id},
        success: function(response){
        },
        error: function(error){
            console.log(error);
        }
    });
}
