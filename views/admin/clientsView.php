 
 <form method="POST" action="<?php echo base_url('main/dynamictable'); ?>">
  <!--   <div class="form-group">                                                
        <div class="lrf-transformY-50 lrf-transition-delay-2">
            <input type="text" id="table_name" class="form-control" name="table_name">                                        
        </div>
    </div>
    <div class="form-group">                                                
        <div class="lrf-transformY-50 lrf-transition-delay-3">
            <select id='column_field' name="column_field">
            	<option value="">Select Module</option>
                <option value="text">text</option>
            	<option value="textarea">textarea</option>
            	<option value="file">file</option>
            	<option value="email">email</option>
            	<option value="number">number</option>
                <option value="dropdown">drop down</option>
            </select>
        </div>
    </div>
    
    <div class="form-group" id="modulefield">
    </div>

    <div class="form-group">
        <div class="lrf-transformY-50 lrf-transition-delay-6">
            <input type="submit" name="submit" id="submit" class="lrf-btn-fill" value="Submit">
        </div>
    </div> -->
</form>










<select id='country_id' name="country_id">
<?php foreach ($getCountry as $key => $val) { ?>
	<option value="<?php echo $val['country_id']; ?>"><?php echo $val['country']; ?></option>
<?php } ?>
</select>

<select id='state_id' name="state_id">	
	<option value=""></option>
</select>

<select id='city_id' name="city_id">	
	<option value=""></option>
</select>