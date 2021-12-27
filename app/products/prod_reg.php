<?php

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'import.html');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'connection.php');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'menu.html'); 

$sql = 'select id,name from tag';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>

    <script src="js/prod_function.js"></script>
</head>

<body style="background-color: rgba(165, 165, 165, 0.39);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg p-3" style="border-radius: 1rem; border: 1px solid #0d6efd;">
                    <div class="cad-header text-center underline">
                        <h3>Cadastrar Produtos</h3>
                    </div>
                    <div class="card-body p-5 text-center">

                        <div class="mb-sm-6 mt-md-2 pb-3">
                            <form method="post" name="form_products">
                                <div class="form-outline form-white mb-4">
                                    <div class="row p-3">
                                        <div class="col col-sm-6 text-center">
                                            <label class="form-label" style="font-size: 22px;" for="product_name">Nome do
                                                Produto</label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <input type="text" id="product_name" name="product_name"
                                                class="form-control form-control-md"  />
                                        </div>
                                    </div>


                                    <div class="row p-3">
                                        <div class="col col-sm-6 ">
                                            <label class="form-label" style="font-size: 22px;" for="product_tag">Tag do
                                                Produto</label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <select name="product_tag" id="product_tag" multiple="multiple" class="form-control">
                                                <?php foreach($data as $dt)
                                                {?>
                                                <option value="'<?php echo $dt['id']; ?>'"><?php echo $dt['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col p-5">

                                    </div>
                                        <button type="submit" class="btn btn-primary btn-lg" id="bt_submit_reg">Cadastrar</button>
    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>