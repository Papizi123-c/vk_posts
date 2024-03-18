$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#postForm').on('submit', function (event){
    event.preventDefault();
    $('#cont1').html('');
    let link = $('#link_group').val();

    let linkArr = link.split('/');

    let group_id = linkArr[3];

    $.ajax({
        url: "/post-form",
        type:"POST",
        data:{
            group_id:group_id,
        },
        success:function(response){
            $('#cont1').append(response);
        },
    });
})
