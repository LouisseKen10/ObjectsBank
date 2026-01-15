<?php
include('includes/header.php');
include('classes/Account.php');
include('classes/Customer.php');

$accounts = [
    new Account(20489446, "Checking", -200),
    new Account(20148896, "Savings", 3800),
    new Account(30948201, "Business", 15000), 
    new Account(40756234, "Investment", 50000)  
];

$customer = new Customer("Ivy", "Stone", $accounts);
?>

    <h2>NAME: <?php echo $customer->getFullName(); ?></h2>

    <table>
        <tr>
            <th>ACCOUNT NUMBER</th>
            <th>ACCOUNT TYPE</th>
            <th>BALANCE</th>
        </tr>

        <?php 
        foreach ($customer->accounts as $account) { 
        ?>
            <tr>
                <td><?php echo $account->accountNumber; ?></td>
                <td><?php echo $account->accountType; ?></td>
                <td class="<?php echo ($account->balance >= 0) ? 'credit' : 'overdrawn'; ?>">
                    ₱<?php echo number_format($account->balance, 2); ?>
                </td>
            </tr>
        <?php 
        } 
        ?>
    </table>
<?php include('includes/footer.php'); ?>