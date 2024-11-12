<!-- app/Views/admin/pending_orders.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Pending Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>ID Package</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Unique Code</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pendingOrders)) : ?>
                    <?php foreach ($pendingOrders as $order) : ?>
                        <tr>
                            <td><?= $order['idmember']; ?></td>
                            <td><?= $order['idpackage']; ?></td>
                            <td><?= $order['order_date']; ?></td>
                            <td><?= $order['status']; ?></td>
                            <td><?= $order['unique_code']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No pending orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>