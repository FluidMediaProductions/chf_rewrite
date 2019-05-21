<div class="footer">
    <div class="container partners my-5">
        <h1 class="brand-text text-uppercase text-center">Our partners</h1>
        <div class="row">
			<?php foreach(PARTNERS as $partner) { ?>
                <div class="col">
                    <a href="<?= $partner['url']; ?>">
                        <img src="<?= $partner['url']; ?>" alt="<?= $partner['name']; ?>" title="<?= $partner['name']; ?>">
                    </a>
                </div>
			<?php } ?>
        </div>
    </div>
    <div class="bg-dark">
        <div class="container py-5">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <h3 class="text-light mb-0">Subscribe to our newsletter</h3>
                </div>
                <div class="col-md-8">
                    <form method="post" action="/newsletter.php?action=add">
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user fa-fw"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control" required placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope fa-fw"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-lg text-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-12 col-lg-3 text-center">
                <img src="/static/images/logo.png" alt="">
            </div>
            <div class="col-md-8 col-lg-6 text-center">
                <div class="row mt-3">
                    <div class="col-md-6 h5 mb-0 text-right">
                        <i class="fa fa-envelope brand-text" aria-hidden="true"></i>
                        <span><?= SITECONST['email'] ?>;</span>
                    </div>
                    <div class="col-md-6 h5 mb-0 text-left">
                        <i class="fa fa-phone brand-text" aria-hidden="true"></i>
                        <span><?= SITECONST['phone']; ?></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 h5 mb-0">
                        <?= SITECONST['address']; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center mt-3 mt-md-0">
                <h4 class="brand-text text-uppercase">Get social</h4>
                <span class="h1 socials">
					<? foreach(SOCIAL as $social) { ?>
                        <a href="<?=$social['url']; ?>" title="<?=$social['name']; ?>">
                            <i class="fa <?=$social['icon']; ?>" data-colour="<?=$social['color']; ?>" aria-hidden="true"></i>
                        </a>
                    <? } ?>
                </span>
            </div>
        </div>
    </div>
    <div class="brand-bg text-light pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <p class="text-uppercase text-center text-sm-left">Copyright <?=date("Y")?> CHF Estate Agents</p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="text-uppercase text-center text-sm-left">
                        <a href="<?=SITECONST['privpolurl']?>" class="text-white">Privacy policy</a>
                        <a href="<?=SITECONST['dataaccessurl']?>" class="text-white">Data access form</a>
                        <a href="<?=SITECONST['dataprivurl']?>" class="text-white">Data privacy notice</a>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="text-center text-sm-right">
                        Website by
                        <a href="https://fluidmedia.wales" class="text-light">Fluid Media Productions</a>
						<!-- And Gemwire https://gemwire.uk -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>