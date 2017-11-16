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
        case 'resetmail':
            $.get(ajax+'?action=resetMailModal', function (res) {
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

        case 'vote':
            var product_id = current.data('product');
            $.get(ajax+'?action=voteModal&product_id='+product_id, function (res) {
                if (res.length > 0) {
                    $('#modalController').html(res);
                    $('#modalController').modal('show');
                } else {
                   $('.btn-modal[data-action=login]').click();
                }
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
        var data = res.match('^1(.*)');
        if (data != null ) {
            window.location = data[1];
        }
        form.parents('#modalController').html(res);
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

$(document).on('submit', '#form-modal-vote', function () {
    var form = $('#form-modal-vote');
    var data = form.serialize();
    var ajax = form.attr('action');
    var dataAjax = {data:data};
    $.post(ajax, dataAjax, function (res) {
        form.parents('#modalController').html(res);
    });
    return false;
})

$(document).on('submit', '#form-modal-reset', function () {
    var form = $('#form-modal-reset');
    var data = form.serialize();
    var ajax = form.attr('action');
    var dataAjax = {data:data};
    $.post(ajax, dataAjax, function (res) {
        alert(res);
        $('#modalController').modal('hide');
    });
    return false;
})

var w_href = window.location.href;
var scrolls = w_href.match('auto_scroll=(.*)$');
if (scrolls != null) {
    $('html,body').animate({
            scrollTop: $('#'+scrolls[1]).offset().top},
        'slow');
}