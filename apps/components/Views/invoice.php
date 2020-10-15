<?php
    $parameter = Factory::getParametersView();
    $model = Factory::get()->getModel("api/Cart");
    $clientModel = Factory::get()->getModel("api/User");
    $invoice = $model->getClientOrder($parameter);
    $client = $clientModel->getClientByRecord($invoice->{'Client'}[0]);
    $lines = $invoice->{'Order Line Items'};
?>
<html>
<style>
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<button class="btn btn-danger no-print" onclick="location.href='<?php echo Factory::redirectTo() ?>home'">BACK TO PAGE</button>
<button class="btn btn-info no-print" onclick="print()">PRINT</button>
<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
<table style="max-width:670px;margin:50px auto 10px;margin-top: 0 !important;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
    <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="<?php echo Factory::redirectTo() ?>assets/img/logo/logo.png" alt="Resonance"></th>
        <th style="text-align:right;font-weight:400;"><?php echo $invoice->{'Fulfill By'} ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> <?php echo $invoice->{'Order Number'} ?></p>
            <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> $<?php echo number_format($invoice->{'Order Total Cost'}, 2) ?></p>
        </td>
    </tr>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> <?php echo $client->{'Name'} ?></p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">ID No.</span> <?php echo $invoice->{'Name'} ?></p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> <?php echo $invoice->{'userEmail'} ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
    </tr>
    <tr>
        <td colspan="2" style="padding:15px;">
            <?php
                $rows = '';
                foreach ($lines as $line){
                    $arr = $model->getClientOrderDetail($line);
                    $object = $arr[0];
                    $rows .= '
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                            <span style="display:block;font-size:13px;font-weight:normal;">'.$object->{'Name'}.'</span> $'.number_format($object->{'Price'}[0],2).'<br /> 
                            <b style="font-size:12px;font-weight:300;"> Qty: '.$object->{'Quantity'}.'</b>
                        </p>
                    ';
                }
                echo $rows;
            ?>
        </td>
    </tr>
    </tbody>
    <tfooter>
        <tr>
            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Resonance<br> Pier 59, Chelsea Piers, New York, NY 10011, Estados Unidos<br><br>
                <b>Phone:</b> +1 212-641-0950<br>
                <b>Email:</b> partner@resonance.nyc.
            </td>
        </tr>
    </tfooter>
</table>
</body>

</html>