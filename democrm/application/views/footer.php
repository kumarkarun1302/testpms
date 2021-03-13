        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                         
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <!-- <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url(''); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(''); ?>assets/libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/vendor/datatables/js/data-table.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link href="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/css/jquery.datetimepicker.min.css" rel="stylesheet"/>
<script src="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/js/jquery.datetimepicker.js"></script>

<script type="text/javascript">
function validateForm() {
    var radios = document.getElementsByName("individualcompany");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert("Must check some option!");
    return formValid;
}


$('#country_id').change(function() {
var country_id= $(this).val(); 
console.log(country_id);
$.ajax({
  url: '<?php echo base_url('insertdb/ajax_state'); ?>',
  type: 'POST',
  dataType: 'html',
  data: { country_id:country_id},
  success: function(response){
    $("#state_id").html(response);
  }
});
});
$('#state_id').change(function() {
var state_id= $(this).val(); 
console.log(state_id);
$.ajax({
  url: '<?php echo base_url('insertdb/ajax_city'); ?>',
  type: 'POST',
  dataType: 'html',
  data: { state_id:state_id},
  success: function(response){
    $("#city_id").html(response);
  }
});
});

$(document).ready(function() {
    var max_fields      = 1000;
    var wrapper         = $(".input_fields_wrap");
    var add_button      = $(".add_field_button");
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div class="row"><div class="col-md-5"><input type="text" name="bank_name[]" class="form-control" placeholder="Bank Name"></div><div class="col-md-5"><input type="text" name="account_number[]" class="form-control" placeholder="Account Number"/></div><div class="col-md-2"><a href="#" class="remove_field">Remove</a></div></div>');
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

$(document).ready(function() {
    var minDate ;
    var maxDate;
    var mDate
    var j = jQuery.noConflict();
    j( "#joined_us_on" ).datepicker({
        dateFormat:"yy-mm-dd",
        onSelect: function() {
        minDate = j( "#joined_us_on" ).datepicker("getDate");
        var mDate = new Date(minDate.setDate(minDate.getDate()));
        maxDate = new Date(minDate.setDate(minDate.getDate() + 3));
        j("#follow_up_date").datepicker("setDate", maxDate);
        j( "#follow_up_date" ).datepicker( "option", "minDate", mDate);
        j( "#follow_up_date" ).datepicker( "option", "maxDate", maxDate);
      }
    });
    var tdate = new Date();
    var ddate = new Date(tdate.setDate(tdate.getDate() + 3));
        //j("#joined_us_on").datepicker("setDate", new Date());
        j( "#follow_up_date" ).datepicker({
            dateFormat:"yy-mm-dd"
        });
    //j("#follow_up_date").datepicker("setDate",ddate);
    
    j("#expiration_date").datepicker({
        dateFormat:"yy-mm-dd"
    });
    j("#delivery_date").datepicker({
        dateFormat:"yy-mm-dd"
    });

});

</script>
</body>
</html>