
		</div>
		<script type="text/javascript" src="<?php echo base_url()?>public/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">var base_url = '<?php echo base_url() ?>';</script>
		<script type="text/javascript" src="<?php echo base_url()?>js/jqajax.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				mode : "textareas",
				content_css: "<?=base_url();?>public/bootstrap/css/bootstrap.min.css",
				setup: function(editor) {
					editor.on('keyup', function(e) {
						var counter = 1000-((tinyMCE.get('msg').getContent()).length);
						if (counter>=0){
							$("#length").addClass("text-success");
							$("#length").removeClass("text-danger");
							$('#length').text('Characters left '+counter);
						} else{
							counter = -counter;
							$("#length").addClass("text-danger");
							$("#length").removeClass("text-success");
							$('#length').text('Extra characters '+counter);
						}
					});
				}
			});
		</script>
	</body>
</html>