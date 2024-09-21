        <div class="ps-wishlist">
            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="<?= base_url(''); ?>">Home</a></li>
                    <li class="ps-breadcrumb__item active"><a href="<?= base_url('home/wishlist'); ?>">Wishlist</a></li>
                </ul>
                <h3 class="ps-wishlist__title">My wishlist on MyMedi</h3>
                <div class="ps-wishlist__content">
                    <div class="ps-wishlist__table">
                        <table class="table ps-table ps-table--product">
                            <?php
                            if (!empty($rowData)) {
                            ?>
                                <thead>
                                    <tr>
                                        <th class="ps-product__remove"></th>
                                        <th class="ps-product__thumbnail"></th>
                                        <th class="ps-product__name">Product name</th>
                                        <th class="ps-product__meta">price</th>
                                        <th class="ps-product__status">Stock status</th>
                                        <th class="ps-product__cart"></th>
                                    </tr>
                                </thead> 
                                <tbody>    
                                    <?php
                                    foreach ($rowData as $data) {
                                    ?>
                                        <tr>
                                            <td class="ps-product__remove"> <a href="<?= base_url('home/session_remove_wishlist/' . $data['pid']) ?>"><i class="icon-cross"></i></a></td>
                                            <td class="ps-product__thumbnail">
                                                <a class="ps-product__image" href="#">
                                                    <figure><img src="<?= base_url(UPLOAD . $data['image']); ?>" alt></figure>
                                                </a>
                                            </td>
                                            <td class="ps-product__name"> <a href="#"><?= $data['name'] ?></a></td>
                                            <td class="ps-product__meta"> <span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$100.65</span></td>
                                            <td class="ps-product__status"><span>in stock</span></td>
                                            <td class="ps-product__cart">
                                                <a href="<?= base_url('home/direct_cart/' . $data['pid']) ?>" class="ps-btn">Add to cart</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <?php } else { ?>
                                    <h4>No Recode</h4>
                                <?php } ?>
                        </table>
                    </div>
                    <div class="ps-wishlist__share">
                        <label>Share on:</label>
                        <ul class="ps-social ps-social--color">
                            <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                            <li><a class="ps-social__link twitter" href="#"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                            <li><a class="ps-social__link pinterest" href="#"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                            <li class="ps-social__linkedin"><a class="ps-social__link linkedin" href="#"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                            <li class="ps-social__reddit"><a class="ps-social__link reddit-alien" href="#"><i class="fa fa-reddit-alien"></i><span class="ps-tooltip">Reddit Alien</span></a></li>
                            <li class="ps-social__email"><a class="ps-social__link envelope" href="#"><i class="fa fa-envelope-o"></i><span class="ps-tooltip">Email</span></a></li>
                            <li class="ps-social__whatsapp"><a class="ps-social__link whatsapp" href="#"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>