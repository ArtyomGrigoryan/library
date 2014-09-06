<div class="row">
	@foreach($var->books as $book)
 		<div class="col-sm-6 col-md-3">
 			<a href="{{ URL::route('book.show', array($book->id)) }}">
	    		<div class="thumbnail" style="height:367px;">
	      			<img src="{{ $book->picture }}" style="max-width:300px; max-height: 200px; display: block;">
	      			<div class="caption">
	        			<h4>{{ $book->name }}</h4>
	       				<b>Авторы</b>:
						@foreach($book->authors as $author)
							{{ link_to_route('author.show', $author->name, array($author->id)) }}
						@endforeach
	      			</div>
	    		</div>
	    	</a>
  		</div>
	@endforeach
</div>