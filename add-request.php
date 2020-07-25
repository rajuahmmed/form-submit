<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add New Request</title>

	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	<div class="wrapper">
		<h1>Add New Request</h1>
		<form action="" method="post">
			<div class="input-item">
				<label for="name">Full Name</label>
				<input type="text" name="name" id="name">
			</div>
			<div class="input-item">
				<label for="email">Email</label>
				<input type="email" name="email" id="email">
			</div>
			<div class="input-item">
				<label for="amount">Amount</label>
				<input type="number" name="amount" id="amount">
			</div>
			<div class="input-item">
				<label for="receipt_id">Receipt ID</label>
				<input type="number" name="receipt_id" id="receipt_id">
			</div>
			<div class="input-item">
				<label for="items">Items</label>
				<select name="items" id="items">
					<option value="">Select items</option>
				</select>
			</div>
			<div class="input-item">
				<label for="note">Note</label>
				<textarea name="note" id="note" cols="30" rows="10"></textarea>
			</div>
			<div class="input-item">
				<label for="city">City</label>
				<input type="text" name="city" id="city">
			</div>
			<div class="input-item">
				<label for="phone">Phone</label>
				<input type="text" name="phone" id="phone">
			</div>
			<div class="input-item">
				<label for="entry_by">Entry By</label>
				<input type="text" name="entry_by" id="entry_by">
			</div>
			<button type="submit">Add</button>
		</form>
	</div>
</body>
</html>