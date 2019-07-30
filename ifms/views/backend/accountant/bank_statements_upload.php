<?php
//echo date('Y-m-d',$tym);
$mfr_submitted = $this->finance_model->mfr_submitted($project,date('Y-m-d',$tym));
?>

<div class="row">
	<div class="col-xs-12">
		<div class="row">
		<a href="<?php echo base_url();?>ifms.php/accountant/dashboard/<?= strtotime(date('Y-m-t',$tym));?>" 
		class="btn btn-primary pull-right">
		<i class="entypo-back"></i>
		<?php echo get_phrase('back');?>
		</a> 
	</div>
	</div>
</div>
</hr>

<div class="row">
	<div class="col-sm-12">
			
			<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('view_bank_statements');?>
            	</div>
            </div>
			<div class="panel-body"  style="max-width:50; overflow: auto;">	
				
          	<!--<button onclick="confirm_action('<?php echo base_url();?>ifms.php/partner/delete_bank_statement/<?=$tym;?>');" class="btn btn-icon btn-red" id="deleting"><i class="entypo-cancel-squared"></i><?= get_phrase('delete');?></button>-->
          	<a href="<?php echo base_url();?>ifms.php/facilitator/ziparchive/<?php echo $project;?>/<?=$tym;?>" class="btn btn-orange btn-icon"><i class="fa fa-cloud-download"></i>Download All</a>
          	<hr>
                <?php
                	
                ?>
                <table class="table table-hover table-striped">
                	<thead>
                		<tr>
                			<th><?= get_phrase('bank_statement');?></th>
                			<th><?= get_phrase('upload_date');?></th>
                			<th><?= get_phrase('file_size');?></th>
                			<th></th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php 
                			//echo 'uploads/bank_statements/'.$project.'/'.date('Y-m',$tym);
                			if(file_exists('uploads/bank_statements/'.$project.'/'.date('Y-m',$tym).'/')){
                			$map = directory_map('uploads/bank_statements/'.$project.'/'.date('Y-m',$tym).'/', FALSE, TRUE);
							
                			foreach($map as $row): $prop = (object)get_file_info('uploads/bank_statements/'.$project.'/'.date('Y-m',$tym).'/'.$row);
                		?>
	                		<tr>
	                			<td><a href="#" onclick="confirm_action('<?php echo base_url();?>ifms.php/facilitator/bank_statement_download/<?= $row;?>/<?=$tym;?>/<?=$project;?>');"><?= $row;?></a></td>
	                			<td><?= date('d-m-Y',$prop->date);?></td>
	                			<td><?= number_format(($prop->size/1000000),2).' MB';?></td>
	                		</tr>
                		<?php 
                			endforeach;
							}
                		?>
                	</tbody>
                </table>							
			
			</div>
	</div>
			
	</div>	
</div>

<script>
	
$(function(){
  Dropzone.options.myDropZone = {
  	//paramName: "bStatement",
  	uploadMultiple:true,
    maxFilesize: 5,
    maxFiles:5,
    addRemoveLinks: true,
    //clickable:false,
    //dictMaxFilesExceeded:'Upload not more than 5 files',
    dictInvalidFileType:'Please upload PDF files only',
    //dictDefaultMessage:'Drag and Drop Bank Statements here',
    dictResponseError: 'Server not Configured',
    //dictFileTooBig:'Maximum file size is 5MB',
    //dictMaxFilesExceeded:'You can only upload one file',
    //autoProcessQueue:true,
    //acceptedFiles: ".pdf",

    init:function(){
      var self = this;
      // config
      self.options.addRemoveLinks = true;
      self.options.dictRemoveFile = "Delete";
      //New file added
      self.on("addedfile", function (file) {
        console.log('new file added ', file);
      });

      
      //On Server Success
      self.on("success", function(file, responseText) {
            //alert(responseText);
            location.reload();
        });
        
        //Delete
        
      
      // Send file starts
      self.on("sending", function (file) {
        console.log('upload started', file);
        $('.meter').show();
      });
      
      
      // File upload Progress
      self.on("totaluploadprogress", function (progress) {
        console.log("progress ", progress);
        $('.roller').width(progress + '%');
      });

      self.on("queuecomplete", function (progress) {
        $('.meter').delay(999).slideUp(999);
      });
      
      // On removing file
      self.on("removedfile", function (file) {
        //console.log(file);
        alert('You are deleting '+file.name);
        
        $.ajax({
		url: "<?php echo base_url();?>ifms.php/partner/delete_bank_statement/<?php echo $tym;?>",
		type: "POST",
		data: { 'name': file.name}
		});
        
      });
    }
  };
})
	
</script>