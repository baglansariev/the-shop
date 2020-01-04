<?php if ( isset($header) ) echo $header; ?>

<main>
    <section class="main-side">
        <div class="slide-image d-flex align-items-center justify-content-center">
            <div class="slide-content d-flex flex-column align-items-center">
                <h1>Simple products</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolor dolore doloribus,
                    eius error ex expedita iusto modi necessitatibus neque optio pariatur quisquam repellendus totam voluptatum.
                    Ducimus laudantium odio vitae.
                </p>
            </div>
        </div>
    </section>
    <section class="inner section">
        <div class="container">
            <h3 class="row-title">Products</h3>
            <div class="row">
                <?php if ( isset($products) ): ?>
                    <?php foreach ($products as $product): ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title"><?php echo $product['title'] ?></h5>
                                    <p class="card-text">
                                        <span>Price:</span>
                                        <span>$<?php echo $product['price'] ?></span>
                                    </p>
                                    <ul class="card-rating d-flex" title="<?php echo 'Average rating: ' . $product['avg_rating']; ?>">
                                        <?php for ($i = 1; $i <= $rating_scale; $i++): ?>
                                            <?php if ($product['avg_rating'] >= $i): ?>
                                                <li class="rating-item current-active" data-val="<?php echo $i; ?>" data-id="<?php echo $product['id'] ?>"><i class="fas fa-star"></i></li>
                                            <?php else: ?>
                                                <li class="rating-item" data-val="<?php echo $i; ?>" data-id="<?php echo $product['id'] ?>"><i class="fas fa-star"></i></li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </ul>
                                    <div class="card-add">
                                        <button type="button" class="btn btn-primary" onclick="cart.add(<?php echo $product['id'] ?>, 1)">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>