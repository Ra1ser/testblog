$(function(){
	var id_num;
	var num = 9;
	Scrolling();
	urlTitle();
	$('#wrong1').hide();
	$('#wrong2').hide();
	$('#update').hide();


	//Вывод данных
	function Select(){
		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data:{select: num, uri: location.pathname},
			success: function(response){
				$('#data').html(response);
				var elements = document.getElementsByTagName('a');
				for (var i = 0; i < elements.length; i++) elements[i].onclick = Handler;
			}
		})
	}

	function Handler()
	{
		var state =
		{
			title: this.getAttribute('title'),
			url: this.getAttribute('href')
		};

		history.pushState(state, state.title, state.url);
		if (location.pathname == "/")
		{
			document.title = "Testblog";
			Select();
		}
		else
		{
			document.title = "Testblog - " + state.url.substr(1);
			Select();
		}
		return false;
	}

	//URL адрес
	function urlTitle()
	{
		if (location.pathname == "/") {
			document.title = "Testblog";
			Select();
		}
		else
		{
			document.title = "Testblog - " + location.pathname.substr(1);
			Select();
		}
	}

	//Скроллинг
	function Scrolling()
	{
		$(window).scroll(function()
		{
			if($(window).scrollTop() + $(window).height() >= $(document).height())
			{
				num+=3;
				$.ajax({
					url: 'crud.php',
					type: 'POST',
					data:{select: num},
					success: function(response){Select();}
				})
			}
		});
	}

	//Вид: сетка
	$('#grid').on('click', function () {
		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data:{temp:1},
			success: function(response){Select();}
		})
	});

	//Вид: лист
	$('#list').on('click', function () {
		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data:{temp:2},
			success: function(response){Select();}
		})
	});

	//Загрузка изображения
	$(document).on('click', '#upload_button', function(){
		var name = document.getElementById("file").files[0].name;
		var form_data = new FormData();
		var ext = name.split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg']) == -1)
		{
			$('#wrong1').fadeIn(0).fadeOut(5000);
		}
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("file").files[0]);
		var f = document.getElementById("file").files[0];
		var fsize = f.size||f.fileSize;
		if(fsize > 2000000)
		{
			$('#wrong2').fadeIn(0).fadeOut(5000);
		}
		else
		{
			form_data.append("file", document.getElementById('file').files[0]);
			$.ajax({
				url:'upload.php',
				method:'POST',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false
			});
		}
	});

	//Сохранение
	$('#save').on('click', function(){
		var title = $('#title').val();
		var text = $('#text').val();

		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data:
			{
				title: title,
				text: text
			},
			success: function(data){
				$('#title').val('');
				$('#text').val('');
				Select();
			}
		});

	});

	//Удаление
	$(document).on('click', '.delete', function(){
		var id = $(this).attr('name');
		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data: {id: id},
			success: function(data){
				$('#update').hide();
				$('#save').show();
				$('#title').val('');
				$('#text').val('');
				Select();
			}
		});
	});

	//Редактирование
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('name');

		$.ajax({
			url: 'edit.php',
			type: 'POST',
			data: {id_num: id},
			success: function(response){
				var getArray = $.parseJSON(response);
				id_num = getArray.id_num;
				$('#title').val(getArray.title);
				$('#text').val(getArray.text);
				$('#update').show();
				$('#save').hide();
			}
		})
	});

	//Обновление
	$('#update').on('click', function(){
		var title = $('#title').val();
		var text = $('#text').val();
		$.ajax({
			url: 'crud.php',
			type: 'POST',
			data: {
				id_num: id_num,
				title_update: title,
				text_update: text
			},
			success: function(){
				$('#title').val('');
				$('#text').val('');
				$('#update').hide();
				$('#save').show();
				Select();
			}
		});
	});
});