function showModel(sel) {
                        var make_id = sel.options[sel.selectedIndex].value;
                        $("#output1").html("");
                        $("#output2").html("");
                        if (make_id.length > 0) {

                            $.ajax({
                                type: "POST",
                                url: "model.php",
                                data: "make_id=" + make_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }