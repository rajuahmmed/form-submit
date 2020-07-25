<form action="<?php echo ROOT_URL; ?>add" method="post" class="entry-form">
	<div class="input-item">
		<label for="name">Full Name</label>
		<input type="text" class="input-field" name="name" id="name" maxlength="20" size="20" required>
	</div>
	<div class="input-item">
		<label for="email">Email</label>
		<input type="email" class="input-field" name="email" id="email" required>
	</div>
	<div class="input-item">
		<label for="amount">Amount</label>
		<input type="number" class="input-field" name="amount" id="amount" required>
	</div>
	<div class="input-item">
		<label for="receipt_id">Receipt ID</label>
		<input type="text" class="input-field" name="receipt_id" id="receipt_id" required>
	</div>
	<div class="input-item">
		<label for="items">Items</label>
		<select class="input-field select2" name="items" id="items" multiple required>
			<?php if ( ! empty( $items ) ) : ?>
				<?php foreach ( $items as $item_id => $item_label ) : ?>
					<option value="<?php echo $item_id; ?>"><?php echo $item_label; ?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
	</div>
	<div class="input-item">
		<label for="city">City</label>
		<input type="text" class="input-field" name="city" id="city" required>
	</div>
	<div class="input-item">
		<label for="phone">Phone</label>
		<input type="number" class="input-field" name="phone" id="phone" value="880" required>
	</div>
	<div class="input-item">
		<label for="entry_by">Entry By</label>
		<input type="number" class="input-field" name="entry_by" id="entry_by" required>
	</div>
	<div class="input-item full-width">
		<label for="note">Note</label>
		<textarea name="note" class="input-field" id="note" cols="30" rows="10"></textarea>
	</div>
	<div class="input-item full-width">
		<button type="submit">Add</button>
		<a href="<?php echo ROOT_URL; ?>">Cancel</button>
	</div>
</form>