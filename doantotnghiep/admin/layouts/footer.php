        <footer class="py-4 bg-light mt-auto ">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Phát triển bởi &copy; Huy Nguyen</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
      
        <script type="text/javascript">
		    function replybox(id){
				var x = document.getElementById(id);
				if (x.style.display == "block"){
					x.style.display = "none";
				} else {
					x.style.display = "block";
				}
			}
		</script>
        <script >
            try {
                setTimeout(()=>{
                    $(".alert").hide();
                },3700)
            } catch (error) {

            }
        </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                    var editor = CKEDITOR.replace( 'editor1' );
                    CKFinder.setupCKEditor( editor );
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>/asset/admin/js/scripts.js"></script>
    </body>
</html>