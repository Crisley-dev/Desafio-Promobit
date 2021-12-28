<?php 
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'verify_login.php');

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'connection.php');


    $pId = filter_input(INPUT_POST, "productId");
    $pName = filter_input(INPUT_POST, "productName");
    $tName = filter_input(INPUT_POST, "tagName");
    $tId = filter_input(INPUT_POST, "tagId");


    $sql = 'select id,name from tag';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    $stmt = NULL;


?>
<form method="post" name="form_edit_products">
    <div class="form-outline form-white mb-4">
        <div class="row p-3">
            <div class="col col-sm-6">
                <label class="form-label" style="font-size: 18px;" for="product_name">Nome do
                    Produto</label>
            </div>
            <div class="col col-sm-6">
                <input type="text" id="product_name" name="product_name"
                    class="form-control form-control-md" style='text-align:center' value="<?php echo $pName; ?>"  />
            </div>
        </div>


        <div class="row p-3">
            <div class="col col-sm-6 ">
                <label class="form-label" style="font-size: 18px;" for="product_tag">Tag do
                    Produto</label>
            </div>
            <div class="col col-sm-6">
                <select name="product_tag" id="product_tag" multiple="multiple" class="form-control">
                    <?php foreach($data as $tag):
   
                    if($tag['id'] == $tId){
                        ?>
                        <option selected value="<?php echo $tag['id']; ?>"><?php echo $tag['name']; ?></option>
                    <?php } else {
                        ?>
                        <option value="<?php echo $tag['id']; ?>"><?php echo $tag['name']; ?></option>
                        <?php
                    } endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col p-5">

        </div>
        <div class="col text-center">
        <button type="submit" class="btn btn-primary btn-lg" id="bt_edit_product">Atualizar</button>
        </div>
   

    </div>
</form>
<script>
    jQuery('#product_tag').multiselect({
            buttonClass: 'form-select',
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
            },
            includeSelectAllOption: true,
            enableFiltering: false,
            nonSelectedText: "Selecione...",
            allSelectedText: "Todos Selecionados",
            widthSynchronizationMode: 'ifPopupIsSmaller',
            buttonWidth: '200px',
            selectAllText: 'Selecionar Tudo'
        });
</script>