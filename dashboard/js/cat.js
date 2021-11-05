$(document).ready(function(){
	
	$(document).on('click', '#add_cat', function(e){
		
		e.preventDefault();
		
		var cat_id = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'cat_detail.php',
			type: 'POST',
			data: 'id='+cat_id,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Greska, probajte ponovo...');
			$('#modal-loader').hide();
		});
		
	});
	
});

