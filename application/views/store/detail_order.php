<div class="container-fluid">
  <div class="row">
	<div class="col-3 font-weight-bolder">Produk</div>
	<div class="col-4 col-md-3 font-weight-bolder">Item</div>
	<div class="col-2 col-md-3 font-weight-bolder">Sub Total</div>
	<div class="col-3 font-weight-bolder">ubah</div>
  </div>
  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $items): ?>
  <div class="row mt-2">
  	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  	<div class="col-3 ">
  		<div class="row">
  			<div class="col-12 col-md-6 col-lg-4">
  				<img src="<?= base_url('assets/upload/products/') . $items['image']; ?>" style="width: 80px;">
  			</div>
  			<!-- product name display when medium or upper width -->
  			<div class="col-12 col-md-6 col-lg-8 d-none d-sm-block">
  				<?= $items['name']; ?>
  			</div>
  		</div>
  	</div>
	<div class="col-4 col-md-3 ">
		<div class="row">
			<!-- product name display when small width -->
			<div class="col-12 d-block d-md-none">
				<small><?= $items['name']; ?></small>
			</div>
			<!-- product quantity display when medium or upper width -->
			<div class="col-md-3 col-lg-2 d-none d-sm-block">
				<?= $items['qty']; ?> X
			</div>
			<!-- product quantity display when small width -->
			<div class="col-12 d-block d-md-none">
				<small><?= $items['qty']; ?> X</small>
			</div>
			<!-- product price display when medium or upper width -->
			<div class="col-md-9 d-none d-sm-block">
				<?= number_format($items['price'],0,',','.');?>
			</div>
			<!-- product price display when small width -->
			<div class="col-12 col-md-9 d-block d-md-none">
				<small><?= number_format($items['price'],0,',','.');?></small>
			</div>
		</div>
	</div>
	<!-- product subtotal price display when medium or upper width -->
	<div class="col-md-3 d-none d-sm-block">
		<?= number_format($items['subtotal'],0,',','.'); ?>
	</div>
	<!-- product subtotal price display when small width -->
	<div class="col-2 d-block d-md-none">
		<small><?= number_format($items['subtotal'],0,',','.'); ?></small>
	</div>
	<div class="col-3 ">
		<a href="#" class="text-decoration-none" data-toggle="modal" data-target="#edit_cart">
                 <i class="fas fa-edit fa-lg"></i>   
        </a>
              
            
	    <a class="pl-2 text-danger" href="<?= base_url('home/removeCart/') . $items['rowid']; ?>">
	            <i class="fas fa-trash-alt fa-lg"></i>
	    </a>
	</div>
  </div>
  <?php endforeach; ?>
	<div class="row justify-content-center mt-4" style="background-color: #D3D3D3 ">
		<div class="col-5 text-right text-dark font-weight-bolder">Total Barang :</div>
		<div class="col-5 text-dark font-weight-bolder text-left">
			Rp <?= number_format($this->cart->total(),0,',','.'); ?>
		</div>
	</div>
	<div class="row justify-content-end mt-3 mr-3">
		<div class="col-3 ">
			<a href="<?= base_url('home/checkout') ?>" class="btn btn-success">checkout</a>
		</div>
	</div>

	<!-- toggle for edit order -->
  <div class="modal fade" id="edit_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            
                  <div class="modal-header">
                    <h5 class="modal-title text-uppercase font-weight-bold">masukkan jumlah barang
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <p class="justify-content-left text-capitalize">
                  
                  </p>

                  <form action="<?= base_url('home/updateCart') ?>" method="post">
                      <input type="hidden" name="rowid" value="<?= $items['rowid']; ?>">
                      <input type="number" name="qty" value="<?= $items['qty']; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Jumlah Produk</button>
                  </div>
                  </form>
            
          </div>
        </div>
      </div>
</div>