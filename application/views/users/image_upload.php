<div class="container">
    <br/><br/><br/>
    <h3 align="center"><?php echo $title; ?></h3>
    <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
        <input type="file" name="image_file" id="image_file"/>
        <br/>
        <br/>
        <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info"/>
    </form>
    <br/>
    <br/>
    <div id="uploaded_image">
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#upload_form').on('submit', function (e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                alert("Please Select the File");
            }
            else {
                $.ajax({
                    url: "<?php echo base_url(); ?>users/ajax_upload",
                    //base_url() = http://localhost/tutorial/codeigniter
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#uploaded_image').html(data);
                    }
                });
            }
        });
    });
</script>