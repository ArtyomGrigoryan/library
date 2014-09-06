<script>
	$(document).ready(function() {
		var uploadInput = $('#picture');
		var	imageInput = $('[name="image"]');
		var	thumb = document.getElementById('thumb');
		var	error = $('div.error'); 

		uploadInput.on('change', function() {
			var data = new FormData();
	       	// Добавим в новую форму файл
	    	data.append('picture', uploadInput[0].files[0]);

	        // Создадим асинхронный запрос
			$.ajax({
		        // На какой URL будет послан запрос
				url: "{{ URL::to('upload') }}",
		        // Тип запроса
		    	type: 'POST',
		        // Какие данные нужно передать
		   		data: data,
		        // Эта опция не разрешает jQuery изменять данные
		    	processData: false,		
		        // Эта опция не разрешает jQuery изменять типы данных
		    	contentType: false,		
		        // Формат данных ответа с сервера
		    	dataType: 'json',
		        // Функция удачного ответа с сервера
		    	success: function(result) { 	
		        	// Получили ответ с сервера (ответ содержится в переменной result)
		        	// Если в ответе есть объект filelink
		    		if(result.filelink) {		
		            	// Зададим сообтветсвующий URL нашему мини изображению
		    			thumb.setAttribute('src', result.filelink); 
		            	// Сохраним значение в input'е
		        		imageInput.val(result.filelink);
		            	// Скроем ошибку
		        		error.hide();
		    		} 
		    		else {
		        		// Выведет текст ошибки с сервера
		    			error.text(result.message);
		        		error.show();
		   			}
		    	},
		        // Что-то пошло не так
		    	error: function(result) {
		    		// Ошибка на стороне сервера
		        	error.text("Upload impossible");
		        	error.show();
		    	}
			});
		});
	});
</script>