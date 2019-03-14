<footer class="container-fluid footer ">
    <div class="container p-0">
        <div class="footer_content row">
            <div class="col-4 footer_info">
                <h4><?php echo of_get_option('footer_title','请设置内容') ?></h4>
                <span></span>
                <p><?php echo of_get_option('footer_content','请设置内容')?></p>
                <div class="footer_ico">
                    <a href="#"  data-toggle="modal" data-target="#exampleModal"><i class="fab fa-weixin"></i></a>
                    <a href="<?php echo of_get_option('footer_github','请填写内容')?>" target="_blank"><i class="fab fa-github"></i></a>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">微信二维码</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo of_get_option('footer_wechat','') ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4 footer_nav">
                <h4><?php echo of_get_option('footer_nav','请设置名称')?></h4>
                <span></span>
	            <?php
	                wp_nav_menu( array( 'theme_location' => 'footerNav','顶部辅助栏'  => 'footerNav','container_class'  => 'footerNav', 'fallback_cb' => 'default_menu' ) );
	            ?>
            </div>
        </div>
        <div class="footer_copy">
            <div class="copy_content"><?php echo of_get_option('footer_copy','请填写内容')?></div>
            <div class="copy_right"><?php echo of_get_option('footer_record','请填写内容')?></div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>

<div class="tools">
    <div class="backTop">
        <i class="fas fa-chevron-up"></i>
    </div>
</div>