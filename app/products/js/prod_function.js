jQuery(function () {

    /* ------------------------------ prod_reg.php ------------------------------ */

    //send the form data to control file insert.tag via ajax
    jQuery('#bt_submit_reg').on("click", function (e) {
        e.preventDefault();
        var product = jQuery('#product_name').val();
        var tag = jQuery('#product_tag').val().toString();

        jQuery.ajax({
            type: "post",
            url: "../products/control/insert_products.php",
            data: {
                "product": product,
                "tag": tag
            },
            dataType: "html",
            success: function (response) {
                statusMsg(response);
            }
        });
    })

    /* ------------------------------ DATA TABLES ----------------------------- */

    //render the DataTable plugin on system tables
    jQuery("#tb_list_products,#tb_edit_products,#tb_del_products").DataTable({
        searching: false,
        "info": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });


    /* ------------------------------ prod_edit.php ----------------------------- */

    
    //on row click, open a window with the information of this row
    jQuery('#tb_edit_products tbody tr').click(function () {

        let pid = jQuery(this).find("td:eq(0)").text();
        let pname = jQuery(this).find("td:eq(1)").text();
        let tname = jQuery(this).find("td:eq(2)").text();
        let tid = jQuery(this).find("td:eq(3)").text();

    // using the plugin jquery confirm open a the window for edit the infos through AJAX
        jQuery.dialog({
            content: function () {
                var self = this;
                return jQuery.ajax({
                    url: "prod_edit_content.php",
                    dataType: "html",
                    method: "post",
                    data: {
                        "productId": pid,
                        "productName": pname,
                        "tagName": tname,
                        "tagId": tid
                    }
                }).done(function (response) {
                    self.setContent(response);
                    self.setTitle('Editar Producto');
                }).fail(function () {

                    self.setContent('Ocorreu um erro.');
                });
            },
        //With the new window fully loaded call a new ajax to update the informations on db
            onContentReady: function () {
                console.log(pname);
                jQuery('#bt_edit_product').on("click", function (e) {
                    e.preventDefault();
                    var product = jQuery('#product_name').val();
                    var tag = jQuery('#product_tag').val().toString();

                    jQuery.ajax({
                        type: "post",
                        url: "control/update_products.php",
                        data: {
                            "old_product": pname,
                            "product": product,
                            "newTagId": tag,
                            "tagId": tid,
                            "productId": pid

                        },
                        dataType: "html",
                        success: function (response) {
                            statusMsg(response);
                        }
                    });

                })

            },
            escapeKey: true,
            backgroundDismiss: true,
            boxWidth: '40%',
            useBootstrap: false
        })
    })

    /* ------------------------------ prod_del.php ------------------------------ */

    //on row click, show a alert with option to delete or not the tag clicked.
    jQuery('#tb_del_products tr').on("click", function () {
        let product_id = jQuery(this).find("td:eq(0)").text();
        let product_name = jQuery(this).find("td:eq(1)").text();
        jQuery.alert({
            title: "Excluir Produto",
            content: "Deseja excluir o produto " + product_name + " ?",
            type: "red",
            buttons: {
                excluir: {
                    text: "Excluir",
                    btnClass: "btn-red",
                    action: function () {
                        jQuery.ajax({
                            type: "post",
                            url: "control/delete_products.php",
                            data: {
                                "product_id": product_id
                            },
                            dataType: "html",
                            success: function (response) {
                                statusMsg(response);
                            }
                        });
                    }
                },
                cancelar: {
                    text: "Cancelar",
                    btnClass: "btn-orange",
                    action: () => {}
                }

            }
        })
    })

    /**
     * Function to return the success and error messages from ajax request
     
     * @param {return from ajax} response 
     */
    function statusMsg(response) {
        if (response == 'success') {
            jQuery.alert({
                title: "Sucesso",
                content: "Operação Realizada com Sucesso",
                type: 'green',
                buttons: {
                    ok: {
                        text: "OK",
                        btnClass: 'btn-green',
                        action: () => {
                            console.log(response);
                            location.reload();
                        }
                    }
                }
            });

        } else {
            jQuery.alert({
                title: "Erro",
                content: "Ocorreu um erro inesperado",
                type: 'red',
                buttons: {
                    ok: {
                        text: "OK",
                        btnClass: 'btn-red',
                        action: () => {
                            console.log(response);

                        }
                    }
                }
            });
        }
    }





})