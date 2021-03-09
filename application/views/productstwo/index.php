<div class="row">   
    <div class="thumbnail">
        <div class="caption">
            <h4 class="pull-right">$<?php echo $this->session->userdata('price'); ?> USD</h4>
            <h4><a href="javascript:void(0);"><?php echo $this->session->userdata('month_year'); ?></a></h4>
        </div>
        <h1>
        	<a href="<?php echo base_url().'productstwo/buy/1'; ?>">
        Pay Now</a>
    	</h1>
    </div>
</div>