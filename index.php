<?php
 if((!empty( $_SERVER['HTTP_X_FORWARDED_HOST'])) || (!empty( $_SERVER['HTTP_X_FORWARDED_FOR'])) ) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
    $_SERVER['HTTPS'] = 'on';
 }
?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="row" style="padding-top: 20px;">
    <div class="col-sm-10 col-sm-offset-1">
        <form class="form-horizontal" id="formUpdateModule">
            <fieldset>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="uid">Número de documento</label>
                    <div class="col-md-6">
                        <input id="uid" name="uid" type="text" placeholder="Número de documento" class="form-control input-md" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-8">
                        <button type="button" id="btn-confirm" name="btn-confirm" class="btn btn-primary">Consultar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <br>
    </div>
</div>

<div id="row-resp" hidden></div>

<script>
    $("#btn-confirm").on("click", function() {
        var uid = $("#uid").val();
        if (uid === "") {
            alert("Debe ingresar un número de documento");
        } else {
            queryIcbf();
        }
    });
</script>
<script>
    function queryIcbf() {
        var uid = $("#uid").val();
        if (uid === "") {
            alert("Debe ingresar un número de documento");
        } else {
            var url = "http://200.29.117.69/apps/icbf/functions.php";
            var data = new FormData();
            data.append("uid", uid);
            $.ajax({
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(resp) {
                    console.log(resp);
                    $("#row-resp").html(resp);
                    $("#row-resp").show();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    }
</script>
