<!DOCTYPE html>
<html>
<head>
    <title>Print 80mm</title>
    <style>
        body {
            font-family: sans-serif;
            width: 76mm;
            margin: 0;
            padding: 0;
        }

        .receipt {
            width: 76mm;
            padding: 5px;
        }

        h3, p {
            text-align: center;
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            padding: 2px 0;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        @media print {
            body {
                width: 76mm;
            }

            @page {
                size: 80mm auto;
                margin: 0;
            }
        }
    </style>
</head>
<body>

<div class="receipt">
    <?php foreach($data['header_sales'] as $header){ ?>
    <p>
        <?php 
            date_default_timezone_set('Asia/Jakarta');
            $hari = [
                'Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa',
                'Wednesday'=>'Rabu','Thursday'=>'Kamis',
                'Friday'=>'Jumat','Saturday'=>'Sabtu'
            ];
            if($header->hd_sales_remaining_debt == 0){
                $status_sales = 'Lunas';
            }else{
                $status_sales = 'Belum Lunas';
            }
            echo $hari[date('l')] . ', ' . date('d/m/Y') . ' -- ' . $status_sales;
        ?>
    </p>
    
    <div class="line"></div>

    <p><?php echo $header->hd_sales_inv; ?></p>
    <p><?php echo $header->customer_name; ?></p>
    <p><?php echo $header->customer_address; ?></p>
    <div class="line"></div>
    <?php } ?>
    <table style="border: 1px 000 solid;">
        <tr>
            <th width="10%" style="text-align: center;">No</th>
            <th width="15%" style="text-align: center;">Qty</th>
            <th width="75%" style="text-align: left;">Nama Produk</th>
        </tr>
        <?php
            $no = 1;
            foreach($data['detail_sales'] as $detail){
        ?>
        <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?php echo $detail->dt_sales_qty ?> x</td>
            <td style="text-align: left;"><?php echo $detail->product_name ?></td>
        </tr>
        <?php } ?>
    </table>
    <div class="line"></div>

    <p style="text-align:left; font-size: 12px;">Catatan: <?php echo nl2br(htmlspecialchars($header->hd_sales_note)); ?></p>
    <p>Terima Kasih</p>
</div>

</body>
</html>