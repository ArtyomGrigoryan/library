<script type="text/javascript">
	$(document).ready(function() {
  		$("#link_authors").click(function() {
        	var div = $("#books_name");
        	div.insertAfter("#authors");
        	return false;
    	});
    	$("#link_books").click(function() {
        	var div = $("#authors");
        	div.insertAfter("#books_name");
        	return false;
    	});
  	});
</script>