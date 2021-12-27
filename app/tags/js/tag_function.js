jQuery(function () {

    /* ------------------------------ tag_reg.php ------------------------------ */

    jQuery('#bt_submit_tag').on("click", function (e) {
        e.preventDefault();
        var tag = jQuery('#tag_name').val();

        console.log(tag);
        

        jQuery.ajax({
            type: "post",
            url: "../tags/control/insert_tags.php",
            data: {
                "tag": tag
            },
            dataType: "html",
            success: function (response) {
                statusMsg(response);
            }
        });
    })

    /* ------------------------------ tag_list.php ----------------------------- */

    jQuery("#tb_list_tags,#tb_edit_tags,#tb_del_tags").DataTable({
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


    /* ------------------------------ tag_edit.php ----------------------------- */


    jQuery('#tb_edit_tags tr').click(function () {

        let tid = jQuery(this).find("td:eq(0)").text();
        let tname = jQuery(this).find("td:eq(1)").text();

        jQuery.dialog({
            content: function () {
                var self = this;
                return jQuery.ajax({
                    url: "tag_edit_content.php",
                    dataType: "html",
                    method: "post",
                    data: {
                        "tagName": tname,
                        "tagId": tid
                    }
                }).done(function (response) {
                    self.setContent(response);
                    self.setTitle('Editar Tag');
                }).fail(function () {

                    self.setContent('Ocorreu um erro.');
                });
            },
            onContentReady: function () {
                jQuery('#bt_edit_tag').on("click", function (e) {
                    e.preventDefault();
                    var tag = jQuery('#tag_name').val();

                    jQuery.ajax({
                        type: "post",
                        url: "control/update_tags.php",
                        data: {
                            "old_tag": tname,
                            "newTag":tag

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

    /* ------------------------------ tag_del.php ------------------------------ */

    jQuery('#tb_del_tags tr').on("click", function () {
        let tag_id = jQuery(this).find("td:eq(0)").text();
        let tag_name = jQuery(this).find("td:eq(1)").text();
        jQuery.alert({
            title: "Excluir Tag",
            content: "Deseja excluir a Tag " + tag_name + " ?",
            type: "red",
            buttons: {
                excluir: {
                    text: "Excluir",
                    btnClass: "btn-red",
                    action: function () {
                        jQuery.ajax({
                            type: "post",
                            url: "control/delete_tags.php",
                            data: {
                                "tag_id": tag_id
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