<?php CandyCart::checkSettings() ?>

<?php if (isset($_GET['newproduct'])) : ?>
	
	<h1>Add New Product</h1>
	
	<form method="post" action="dashboard.php?page=candyCart">
		<fieldset>
			<ul>
				<li>
					<label>Product Name</label>
					<input type="text" name="name" placeholder="Product Name" />
				</li>
				<li>
					<label>Product Qty</label>
					<input type="text" name="qty" placeholder="Product Qty" />
				</li>
			</ul>
		</fieldset>
		<input type="submit" name="addproduct" class="button" value="Add Product" />
	</form>
	
<?php elseif (isset($_GET['editproduct'])) : ?>
	
	<h1>Edit Product</h1>
	
<?php else : ?>

	<div class="tabview">
		
		<?php if (!isset($_GET['tab'])) : ?>
	
		<h1 class="left">Products</h1>
		<a href="dashboard.php?page=candyCart&newproduct" class="button right">Add New Product +</a>
		
		<?php if(isset($_POST['addproduct'])) : ?>
		
			<p class="message success">Product Added</p>
			<?php CandyCart::addProduct($_POST['name'], $_POST['qty'], 'Test') ?>
		
		<?php endif ?>
		
		<?php CandyCart::productTable() ?>
	
		<?php elseif($_GET['tab'] == 'categories') : ?>
	
		<h1 class="left">Categories</h1>
		<a href="dashboard.php?page=candyCart&newproduct" class="button right">Add New Category +</a>
	
		<?php elseif($_GET['tab'] == 'purchases') : ?>
	
		<h1 class="left">Purchases</h1>
	
		<?php elseif($_GET['tab'] == 'settings') : ?>
	
		<h1 class="left">Settings</h1>
		
		<?php else : ?>
	
		<h1>Error 404</h1>
		<p class="leadin">Page not found!</p>
	
		<?php endif; ?>
	</div>
	<ul class="tablist">
		<li class="products<?php if(!isset($_GET['tab'])) : ?> active-tab<?php endif ?>">
			<a href="dashboard.php?page=candyCart">Products</a>
		</li>
		<li class="categories<?php if(isset($_GET['tab']) && $_GET['tab'] == 'categories') : ?> active-tab<?php endif ?>">
			<a href="dashboard.php?page=candyCart&tab=categories">Categories</a>
		</li>
		<li class="purchases<?php if(isset($_GET['tab']) && $_GET['tab'] == 'purchases') : ?> active-tab<?php endif ?>">
			<a href="dashboard.php?page=candyCart&tab=purchases">Purchases</a>
		</li>
		<li class="settings<?php if(isset($_GET['tab']) && $_GET['tab'] == 'settings') : ?> active-tab<?php endif ?>">
			<a href="dashboard.php?page=candyCart&tab=settings">Settings</a>
		</li>
	</ul>
	
<?php endif; ?>