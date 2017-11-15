<div class="modal-dialog form-guess" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bình chọn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="title-sucess">Chúc mừng bạn đã bình chọn thành công! Mã số bình chọn của bạn là:<span><?php echo $code ?></span></div>
            <form>
                <div class="form-group facebook">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $linkProduct ?>" class="btn">Chia sẻ<i class="fa fa-facebook" aria-hidden="true" style="margin-left: 8px;"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
