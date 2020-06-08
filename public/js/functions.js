$(document).ready(function() {
    $("#cipher_text").keyup(function(event) {
        console.log("any keypress " + event.keyCode);
        if (event.keyCode === 13) {
            console.log("enter'a basildi");
            event.preventDefault();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/decoder',
            data: {
                cipher: $(this).val(),
                shift_number: $("#shift_number").val(),
                decode_option: $("select").val()
            },
            dataType: 'json',
            success: function(data) {
                console.log("success sending and receiving data");
                var data = data.res;

                $("#txtDecoded").text(data);
            },
            error: function(data) {
                var errors = data.responseText;
                console.log(errors);
            }
        });

    });
    $("#shift_number").change(function() {
        console.log("shift degisti");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/decoder',
            data: {
                cipher: $("#cipher_text").val(),
                shift_number: $("#shift_number").val(),
                decode_option: $("select").val()
            },
            dataType: 'json',
            success: function(data) {
                console.log('success in shift');
                var data = data.res;

                $("#txtDecoded").text(data);
            },
            error: function(data) {
                var errors = data.responseText;
                console.log(errors);
            }
        });
    });
    $("select").change(function() {
        console.log("select degisti");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/decoder',
            data: {
                cipher: $("#cipher_text").val(),
                shift_number: $("#shift_number").val(),
                decode_option: $("select").val()
            },
            dataType: 'json',
            success: function(data) {
                console.log('success in select');
                var data1 = data.res;

                $("#txtDecoded").text(data1);
            },
            error: function(data) {
                var errors = data.responseText;
                console.log(errors);
            }
        });
    });
});

function addCipherForm() {
    $("#cipher_text").keyup(function(event) {
        if (event.keyCode === 13) {
            console.log("addCIpherForm");
            event.preventDefault();
            $.ajax({
                type: 'GET',
                url: '/decoder',
                success: function(data) {
                    $("#txtDecoded").text(data.res);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    });


}

// function deleteTaskForm(task_id) {
//     $.ajax({
//         type: 'GET',
//         url: '/tasks/' + task_id,
//         success: function(data) {
//             $("#frmDeleteTask #delete-title").html("Delete Task (" + data.task.task + ")?");
//             $("#frmDeleteTask input[name=task_id]").val(data.task.id);
//             $('#deleteTaskModal').modal('show');
//         },
//         error: function(data) {
//             console.log(data);
//         }
//     });
// }