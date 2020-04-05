<div class="container-fluid">
  <div class="row mb-4">
	<div class="col-4 col-md-3 font-weight-bolder">Produk</div>
	<div class="col-4 col-md-3 font-weight-bolder">Item</div>
	<div class="col-4 col-md-3 font-weight-bolder">Sub Total</div>
  </div>

  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $items): ?>
  <div class="row mt-2">
  	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  	<div class="col-4 col-md-3 ">
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
	<div class="col-4 d-block d-md-none">
		<div class="row py-4 pl-3">
			<small><?= number_format($items['subtotal'],0,',','.'); ?></small>
		</div>
	</div>
  </div>
  <?php endforeach; ?>
	<div class="row justify-content-center mt-4" style="background-color: #D3D3D3 ">
		<div class="col-6 text-right text-dark font-weight-bolder">Total Barang :</div>
		<div class="col-6 text-dark font-weight-bolder text-left">
			Rp <?= number_format($this->cart->total(),0,',','.'); ?>
		</div>
	</div>
  
</div>