
 <script type="text/javascript">

<?php if(isset($result['client_type'])) { ?> 
$("#client_type").val('<?php if(isset($result['client_type'])) { echo $result['client_type']; }?>');
<?php } ?>


<?php if(isset($result['joined_us_on'])) { ?>
$("#joined_us_on").val('<?php if(isset($result['joined_us_on'])) { echo $result['joined_us_on']; }?>');
<?php } ?>


<?php if(isset($result['follow_up_date'])) { ?>
$("#follow_up_date").val('<?php if(isset($result['follow_up_date'])) { echo $result['follow_up_date']; }?>');
<?php } ?>
    
    
    document.getElementById('comment').onkeydown = function(e){
        if(e.keyCode == 13){
            $.ajax({
                url: '<?php echo base_url('insertdb/insert_comment'); ?>', 
                dataType: 'html',type: 'post',
                data:{comment:$("#comment").val(),lead_id:'<?php echo $order_number_leads; ?>'},
                success: function (response) {
                    $("#comment").val('');
                    $('#ajax_comment').html(response);
                },
                error: function (response) {
                console.log(response);
                }
            });
        }
    };
    getListComment();
    function getListComment()
    {
        $.ajax({
            url: '<?php echo base_url('insertdb/getListComment1'); ?>', 
            dataType: 'html',type: 'post',
            data:{lead_id:'<?php echo $order_number_leads; ?>'},
            success: function (response) {
                $('#ajax_comment').html(response);
            }
        });
    }

</script>
