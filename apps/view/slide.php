<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach ($slides as $key => $val) {
        ?>
            <div class="swiper-slide">
                <div class="skewed wrapper">
                    <div class="layer bottom bottom1">
                        <div class="content-wrap">
                            <div class="content-body">
                                <h1><?php echo $val['text_slide'] ?></h1>
                            </div>
                            <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img1'] ?>" />
                        </div>
                    </div>
                    <div class="layer top top1">
                        <div class="content-wrap">
                            <div class="content-body">
                                <h1><?php echo $val['text_slide'] ?></h1>
                            </div>
                            <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img2'] ?>" />
                        </div>
                    </div>
                    <div class="mouse mouse1"></div>
                </div>
            </div>
        <?php
        } ?>
        <!-- <div class="swiper-slide">
            <div class="skewed wrapper" id="wrapper2">
                <div class="layer bottom bottom2">
                    <div class="content-wrap">
                        <div class="content-body">
                            <h1>NIKE AIR</h1>
                            <p>200$</p>
                        </div>
                        <img src="/p229shop/public/imageg/Nike_Jordan_Proto_Max1-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class="layer top top2">
                    <div class="content-wrap">
                        <div class="content-body">
                            <h1>NIKE AIR</h1>
                            <p>200$</p>
                        </div>
                        <img src="/p229shop/public/image/NikeJordanProtoMax-removebg-preview.png" alt="">
                    </div>
                </div>
                <div class="mouse mouse2"></div>
            </div>
        </div> -->
    </div>
</div>