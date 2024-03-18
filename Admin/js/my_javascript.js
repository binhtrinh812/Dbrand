

// Xử lý ajax xóa sản phẩm
$(document).on('click', '#del_product', function() {
    let idJs = $(this).val();
    let roleUser = $('#role_account').val();
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    check = confirm("Bạn có muốn xóa sản phẩm?");
    if(check) {
        $.ajax({
            url : './Servers/ajax_process.php?action=del_product',
            type : 'POST',
            data: {
                id: idJs,
                role: roleUser,
                startDate: startDate,
                endDate : endDate
            },
            dataType: 'html',
            success : function(response) {
                if(response == 1) {
                    toastr["error"]("Bạn không có quyền xóa sản phẩm!");
                }
                else {
                    $('#list_product').html(response);
                    toastr["success"]("Xóa sản phẩm thành công!")
                }
            }      
        })
    }  
})

// Hàm show chi tiết sản phẩm
const showDescription = (idJs) => {
    $.ajax({
        type: "POST",
        url: "./Servers/ajax_process.php?action=description",
        data: {
            id: idJs //lỗi js
        },
        dataType: "html",
        success: function(response) {
            $('.modal-description').html(response);
        }
    });
}

// Hàm show số lượng sản phẩm trong kho
const showQuantity = (idJs) => {
    $.ajax({
        type: "POST",
        url: "./Servers/ajax_process.php?action=quantity",
        data: {
            id: idJs //lỗi js
        },
        dataType: "html",
        success: function(response) {
            $('.modal-quantity').html(response);
        }
    });
}

// Xử lý ajax xem thông tin sản phẩm
$(document).on('click', '.detail_product', function() {
    let idJs = $(this).val();
    $.ajax({
        url : './Servers/ajax_process.php?action=modal',
        type : 'POST',
        data: {
            id: idJs
        },
        dataType: 'html',
        success : function(response) {
            // console.log(response);
            // if(response) {
            // }
            showDescription(idJs);
            showQuantity(idJs);
            // $('.modal-description').html(response);
        }      
    })
})


// Xử lý ajax xóa đơn hàng
$(document).on('click', '#del_order', function() {
    let idJs = $(this).val();
    let roleUser = $('#role_account').val();
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    check = confirm("Bạn có muốn xóa đơn hàng?");
    if(check) {
        $.ajax({
            url : './Servers/ajax_process.php?action=del_order',
            type : 'POST',
            data: {
                id: idJs,
                role: roleUser,
                startDate: startDate,
                endDate : endDate
            },
            dataType: 'html',
            success : function(response) {
                if(response == 1) {
                    toastr['error']('Bạn không có quyền xóa đơn hàng!');
                }
                else {
                    $('#list_order').html(response);
                    toastr["success"]("Xóa đơn hàng thành công!")
                }
            }      
        })
    }  
})

// Xử lý ajax show đơn hàng dựa theo từng ngày
$(document).on('click', '.applyBtn', function() {
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    $.ajax({
        url : './Servers/ajax_process.php?action=show_order',
        type : 'POST',
        data: {
            startDate: startDate,
            endDate : endDate
        },
        dataType: 'html',
        success : function(response) {
            $('#list_order').html(response);
        }      
    })
})

// Xử lý ajax hiện thị hóa đơn sản phẩm theo ngày
$(document).on('click', '.applyBtn', function() {
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    $.ajax({
        url : './Servers/ajax_process.php?action=show_bill',
        type : 'POST',
        data: {
            startDate: startDate,
            endDate : endDate
        },
        dataType: 'html',
        success : function(response) {
            $('#list_bill').html(response);
        }      
    })
})

// Xử lý ajax hiện thị thông tin sản phẩm theo ngày
$(document).on('click', '.applyBtn', function() {
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    $.ajax({
        url : './Servers/ajax_process.php?action=show_product',
        type : 'POST',
        data: {
            startDate: startDate,
            endDate : endDate
        },
        dataType: 'html',
        success : function(response) {
            $('#list_product').html(response);
        }      
    })
})


// Xóa sản phẩm trong chi tiết đơn hàng

$(document).on('click', '.del_order_detail', function() {
    let idJs = $(this).val();
    let statusJs = $('.order_status').val();
    check = confirm("Bạn có muốn xóa sản phẩm?");
    if(check) {
        $.ajax({
            url : './Servers/ajax_process.php?action=del_product_orders',
            type : 'POST',
            data: {
                id: idJs,
                status: statusJs,
            },
            dataType: 'html',
            success : function(response) {
                if(response == 1) {
                    toastr['error']('Đơn hàng đã được giao, bạn không thể xóa!');
                }
                else {
                    $('#list_order_detail').html(response);
                    toastr["success"]("Xóa sản phẩm thành công!")
                }
            }      
        })
    }  
})

$(`span.sub_avatar__remove`).click(function () { 
    let id = $(this).attr(`sub-avatar-id`);
    var itemId =  $(`.sub_avatar__id`).val();

    if(itemId == '') {
        $(`.sub_avatar__id`).val(id);

    } else {
        $(`.sub_avatar__id`).val(itemId+','+id);

    }
    $(`#sub_img__${id}`).remove();
});

$(`span.avatar_remove`).click(function () {
    let id = $(this).attr(`avatar-id`);
    $(`#avatar_${id}`).remove();
});



//ngày tháng năm lịch
$(document).ready(function () {
    $('.list-product').DataTable();

    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        
        $(`#start_date`).val(start.format('YYYY-MM-DD'));
        $(`#end_date`).val(end.format('YYYY-MM-DD'));
      });
});

$(document).ready(function () {
    $('.list_order').DataTable({
        order: [[1, 'asc']],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                autoFilter: true,
                title: 'Danh sách đơn hàng',
                messageTop: 'Danh sách đơn hàng'
            },
            {
                extend: 'pdfHtml5',
                autoFilter: true,
                title: 'Danh sách đơn hàng',
                messageTop: 'Danh sách đơn hàng'
            },
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="./images/icon/icon-shortcut-logo.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    });
    $('.list_user').DataTable({
        order: [[3, 'asc']],
    });
    
    $('.list_bill').DataTable({
        order: [[1, 'asc']],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                autoFilter: true,
                title: 'Danh sách hóa đơn',
                messageTop: 'Danh sách hóa đơn'
            },
            {
                extend: 'pdfHtml5',
                autoFilter: true,
                title: 'Danh sách hóa đơn',
                messageTop: 'Danh sách hóa đơn'
            },
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="./images/icon/icon-shortcut-logo.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    });
});



// Xử lý ajax upload ảnh 
$(document).ready(function () {
    $('#avatar').on('change', function(){
        var upImg = this;
        var fileAva = upImg.files[0];
        var formData = new FormData();
        formData.append('avatar', fileAva);
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if(ajax.status == 200 && ajax.readyState == 4) {
                if(ajax.responseText == 0) {
                    toastr['error']('File ảnh không hợp lệ!');
                }
                else {
                    var imgPath = ajax.responseText;
                    $('.up_ava__success').attr('src', './Servers/upload/'+imgPath);
                }
            }
        }
        ajax.open("POST", './Servers/upload.php', true);
        ajax.send(formData)
    })
})

// Xử lý ajax upload nhiều ảnh 
$(document).ready(function () {
    // $('#sub_avatar').on('change', function(){
    $('#sub_avatar').on('change', function(){
        var upImg = this;
        var formData = new FormData();
        var file, len = upImg.files.length;
        for(var i = 0; i < len; i++) {
            file = upImg.files[i];
            formData.append("sub_avatar[]", file);
        }
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if(ajax.status == 200 && ajax.readyState == 4) {
                if(ajax.responseText == 0) {
                    toastr['error']('File ảnh không hợp lệ!');
                }
                else {
                    // res trả về tag img html có src link tới thư mục upload
                    var res = ajax.responseText;
                    $('.view_sub__avatar').append(res)
                }
            }
        }
        ajax.open("POST", './Servers/upload.php', true);
        ajax.send(formData)
    })
})
