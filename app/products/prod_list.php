<?php

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'import.html');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'connection.php');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'menu.html'); 

$sql = 'SELECT product.id as pid, product.name as pname, tag.id as tid,tag.name as tname FROM product INNER JOIN product_tag ON product.id = product_tag.product_id INNER JOIN tag ON product_tag.tag_id = tag.id order by product.id';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    <link rel="stylesheet" href="css/style_product.css">
    <script src="js/prod_function.js"></script>
</head>

<body >
    <div class="container py-3 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-12 col-xl-5">
                <div class="card shadow-lg p-3 card-geral">
                    <div class="cad-header text-center underline">
                        <h3>Lista de  Produtos</h3>
                    </div>
                    <div class="card-body p-3 text-center">

                        <div class="mb-sm-6 mt-md-2 pb-3">
                            <table class="table table-hover table-striped table-responsive text-center" id="tb_list_products">
                                <thead>
                                    <th>ID</th>
                                    <th>Produto</th>
                                    <th>TAG</th>
                                </thead>
                                <tbody>
                                   <?php foreach($result as $data):
            
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $data['pid'];?></td>
                                        <td><?php echo $data['pname'];?></td>
                                        <td><?php echo $data['tname']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>