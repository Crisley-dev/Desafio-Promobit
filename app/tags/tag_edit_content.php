<?php 
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'verify_login.php');

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'connection.php');


    $tName = filter_input(INPUT_POST, "tagName");
    $tId = filter_input(INPUT_POST, "tagId");



?>
<form method="post" name="form_edit_products">
    <div class="form-outline form-white mb-4">
        <div class="row p-3">
            <div class="col col-sm-6">
                <label class="form-label" style="font-size: 18px;" for="product_name">Nome da
                    Tag</label>
            </div>
            <div class="col col-sm-6">
                <input type="text" id="tag_name" name="tag_name"
                    class="form-control form-control-md" style='text-align:center' value="<?php echo $tName; ?>"  />
            </div>
        </div>


        <div class="col p-5">

        </div>
        <div class="col text-center">
        <button type="submit" class="btn btn-primary btn-lg" id="bt_edit_tag">Atualizar</button>
        </div>
   

    </div>
</form>