            </div>
        <div class="partners">
            <div class="container" >
                <div class="swiper js-partners-slide swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper partners-slide__wrap" id="swiper-wrapper-4b6dcd6108d6df98d" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide partners-slide__item swiper-slide-active" role="group" aria-label="1 / 5" style="width: 274px; margin-right: 10px; background-color:#f6f8f8;">
                        <a href="">
                        <img src="<?php echo base_url() ?>/asset/frontend/images/apple.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide partners-slide__item swiper-slide-next" role="group" aria-label="2 / 5" style="width: 274px; margin-right: 10px;">
                        <a href="">
                        <img src="<?php echo base_url() ?>/asset/frontend/images/oppo.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide partners-slide__item" role="group" aria-label="3 / 5" style="width: 274px; margin-right: 10px;">
                        <a href="">
                        <img src="<?php echo base_url() ?>/asset/frontend/images/samsung.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide partners-slide__item" role="group" aria-label="4 / 5" style="width: 274px; margin-right: 10px;">
                        <a href="">
                        <img src="<?php echo base_url() ?>/asset/frontend/images/realme.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide partners-slide__item" role="group" aria-label="5 / 5" style="width: 274px; margin-right: 10px;">
                        <a href="">
                        <img src="<?php echo base_url() ?>/asset/frontend/images/nokia.png" alt="">
                        </a>
                    </div>
                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-4b6dcd6108d6df98d" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-4b6dcd6108d6df98d" aria-disabled="true"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
            <div class="container-pluid">
                <section id="footer"  style="background-color:#11556B">
                    <div class="container">
                        <div class="col-md-6" id="shareicon" style=" background-color:#11556B">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-4" id="ft-about">
                                <p>Dịch vụ
                                <p>
                                   
                            </div>
                            <div class="col-md-4 box-footer" >
                                <h4 class="tittle-footer-1">Cửa hàng</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href="<?php echo base_url() ?>/introduce.php"><i></i> Giới thiệu</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href="<?php echo base_url() ?>/insurance.php"><i></i> Chính sách bảo hành </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href="<?php echo base_url() ?>/contact.php"><i></i>  Liên hệ </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-4" id="footer-support">
                                <h4 class="tittle-footer-1"> Liên hệ</h4>
                                <ul>
                                    <li>
                                        <p><i class="fa fa-home" style="font-size: 16px; margin-left: -3px;"></i> Địa chỉ :  40 Lê Thanh Nghị – Bách Khoa – Hà Nội</p>
                                        <p><i class="fa fa-mobile" style="font-size: 20px;"></i>  0243.902.5678 </p>
                                        <p><i class="fa fa-envelope" style="font-size: 13px;"></i> giaphatmobile@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Đồ án tốt nghiệp © 2022 . 
                       
                    </p>
                </section>
            </div>
            </div>
            </div>
            </div>      
            </div>
            <script  src="<?php echo base_url() ?>/asset/frontend/js/slick.min.js"></script>
            </body>
            </html>
            <script type="text/javascript">
                $(function() {
                    $hidenitem = $(".hidenitem");
                    $itemproduct = $(".item-product");
                    $itemproduct.hover(function(){
                        $(this).children(".hidenitem").show(100);
                    },function(){
                        $hidenitem.hide(300);
                    })
                })
                
                $(function()
                {
                    $updatecart = $(".updatecart");
                    $updatecart.click(function(e)
                    {
                        e.preventDefault();
                        $qty = $(this).parents("tr").find("#qty").val();
                        $key = $(this).attr("data-key");
                        $.ajax({
                            url: 'cap-nhat-gio-hang.php',
                            type: 'GET',
                            data: {'qty':$qty,'key':$key},
                            success:function(data)
                            {
                                if (data == 1) 
                                {
                                    alert("Cập nhật thành công");
                                    location.href='gio-hang.php';
                                }else{
                                    alert("Số lượng sản phẩm không đủ vui lòng cập nhật lại số lượng");
                                    location.href='gio-hang.php';

                                }
                            }
                        });
                    })
                })
                
            </script>
              <script >
            try {
                setTimeout(()=>{
                    $(".alert").hide();
                },3700)
            } catch (error) {

            }
        </script>