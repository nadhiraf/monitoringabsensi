<div>									
<?php echo form_open_multipart('UploadAbsen/do_upload');?>                      
<label>Excel File:</label>                        
<input type="file" name="userfile" />				                   
<input type="submit" value="upload" name="upload" />
</form>	
</div>

 <div>
            <?php echo @$pesan; ?>
            <?php echo @$output; ?>
</div>
