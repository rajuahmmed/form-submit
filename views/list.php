<a href="<?php echo ROOT_URL; ?>add">Add New</a>
<table id="entry-list">
	<thead>
        <tr>
            <th>Entry at</th>
            <th>Buyer</th>
            <th>Receipt ID</th>
            <th>Amount</th>
            <th>Items</th>
            <th>Buyer Email</th>
            <th>City</th>
            <th>Phone</th>
            <th>Entry by</th>
            <th>Note</th>
        </tr>
	</thead>
	<tbody>
        <?php if ( ! empty( $entries ) ) : ?>
            <?php foreach( $entries as $entry ) : ?>
                <tr>
                    <td><?php echo $entry['entry_at'] ?></td>
                    <td><?php echo $entry['buyer'] ?></td>
                    <td><?php echo $entry['receipt_id'] ?></td>
                    <td><?php echo $entry['amount'] ?></td>
                    <td>
                        <?php
                            $user_items = explode( ',', $entry['items'] );
                            if ( ! empty( $user_items ) ) {
                                foreach( $user_items as $user_item ) {
                                    echo $items[ $user_item ];
                                }
                            }
                        ?>
                    </td>
                    <td><?php echo $entry['buyer_email'] ?></td>
                    <td><?php echo $entry['city'] ?></td>
                    <td><?php echo $entry['phone'] ?></td>
                    <td><?php echo $entry['entry_by'] ?></td>
                    <td><?php echo $entry['note'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>