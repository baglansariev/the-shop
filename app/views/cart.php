<?php if ( isset($header) ) echo $header; ?>

<section class="cart-section inner section">
    <div class="container">
        <h3 class="row-title">My cart</h3>

        <?php if ( isset($cart_items) ): ?>

            <div class="row">
                <div class="col-lg-8">
                    <table class="cart-products">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart_items as $item): ?>
                                <tr>
                                    <td>
                                        <div class="cart-product">
                                            <div class="image">
                                                <img src="<?php echo $item['image']; ?>" alt="" class="img-fluid">
                                            </div>
                                            <h4 class="title"><?php echo $item['title']; ?></h4>
                                        </div>
                                    </td>
                                    <td>$<?php echo $item['price']; ?></td>
                                    <td>
                                        <input type="number" value="<?php echo $item['quantity']; ?>" id="itemQuantity_<?php echo $item['id']; ?>">
                                        <button type="button" class="btn btn-sm btn-success" title="Change quantity" onclick="cart.changeQuantity( <?php echo $item['id']; ?>, '#itemQuantity_<?php echo $item["id"]; ?>' )"><i class="fas fa-sync-alt"></i></button>
                                    </td>
                                    <td>$<?php echo $item['item_total_price']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="cart.remove( <?php echo $item['id']; ?> )"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <form method="post" class="checkout">
                        <!--  Transport list  -->
                        <?php if ( isset($transports) ): ?>

                            <div class="transport">
                                <div class="form-group">
                                    <label for="deliveryType">Transport</label>
                                    <select name="transport" id="deliveryType" class="form-control" onchange="checkout.getTotal(this.value)">
                                        <option selected disabled>Choose transport type</option>
                                        <?php foreach ($transports as $transport): ?>
                                            <option value="<?php echo $transport['price']; ?>"><?php echo $transport['title'] . ' ($' . $transport['price'] . ')' ; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        <?php endif; ?>
                        <div class="bill">
                            <!--  Sum of products price  -->
                            <p class="sum d-flex justify-content-between">
                                <span>Sum</span>
                                <span id="sum"><?php if ( isset($items_total_price) ) echo '$' . $items_total_price; ?></span>
                            </p>
                            <!--  Sum of products price with Transport price  -->
                            <p class="total d-flex justify-content-between">
                                <span>Total</span>
                                <span id="total"><?php if ( isset($items_total_price) ) echo '$' . $items_total_price; ?></span>
                            </p>
                        </div>
                        <button type="button" class="btn btn-lg btn-success" onclick="checkout.buy('.checkout')">PAY</button>
                    </form>
                </div>
            </div>

        <?php else: ?>
            <div class="row">
                <div class="col-lg-12">
                    <p>You don't have any items yet. Let's go for some <a href="/" class="empty-cart">purchases</a></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
