$(document).on('click', '.btn-modal', function () {
    var current = $(this);
    var action = current.data('action');
    var ajax = current.data('ajax');
    switch (action) {
        case 'login':
            $.get(ajax+'?action=loginModal', function (res) {
                $('#modalController').html(res);
                $('#modalController').modal('show');
            });
            break;
        case 'register':
            $.get(ajax+'?action=registerModal', function (res) {
                $('#modalController').html(res);
                $('#modalController').modal('show');
            });
            break;
    }
    return false;
})

$(document).on('submit', '#form-modal-login', function () {
    var form = $('#form-modal-login');
    var data = form.serialize();
    var ajax = form.attr('action');
    var dataAjax = {data:data};
    $.post(ajax, dataAjax, function (res) {
        var json = $.parseJSON(res);
        if (json.status == 1) {
            window.location = json.href;
        }
        form.parents('#modalController').html(json.html);
    });
    return false;
})

$(document).on('submit', '#form-modal-register', function () {
    var form = $('#form-modal-register');
    var data = form.serialize();
    var ajax = form.attr('action');
    var dataAjax = {data:data};
    $.post(ajax, dataAjax, function (res) {
        form.parents('#modalController').html(res);
    });
    return false;
})