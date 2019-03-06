<footer class="container-fluid footer">
    <div class="container">
        <div class="footer_content row">
            <div class="col-4 footer_info">
                <h4><?php echo of_get_option('footer_title','请设置内容') ?></h4>
                <span></span>
                <p><?php echo of_get_option('footer_content','请设置内容')?></p>
                <div class="footer_ico">
                    <a href=""><i class="fab fa-weixin"></i></a>
                    <a href=""><i class="fab fa-github"></i></a>
                </div>
            </div>
            <div class="col-4 footer_link">

            </div>
            <div class="col-4">25</div>
        </div>
        <div class="footer_copy">
            <div class="copy_content"><?php echo of_get_option('footer_copy','请填写内容')?></div>
            <div class="copy_right"><?php echo of_get_option('footer_record','请填写内容')?></div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>