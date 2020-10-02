<!DOCTYPE HTML>
<html>
<head>
    <title>Testblog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$meta_desc?>" />
    <meta name="keywords" content="<?=$meta_keywords?>" />
    <link rel="icon" href="/icon.png">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">TEST BLOG</a>
        </div>
        <ul class="nav navbar-nav">
            <button type="button" class="btn btn-info navbar-btn" data-toggle="modal" data-target="#add_edit"><span class="glyphicon glyphicon-pushpin"></span></button>
            <button type="button" id="grid"  class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-th"></span></button>
            <button type="button" id="list" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-th-list"></span></button>
        </ul>
    </div>
</nav>
<br><br><br>
<div class="container">
    <br>
    <!-- Модальное окно!-->
    <div class="modal fade" id="add_edit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id = "wrong1" style="text-align: center">Неверный формат файла</h5>
                    <h5 id = "wrong2" style="text-align: center">Размер файла превышает допустимый объём</h5>
                </div>
                <div class="modal-body">
                    <form id ="form" method="POST" enctype="multipart/form-data">
                        <div class="form-inline">
                            <label>Изображение</label></br>
                            <input type="file" name="file" id="file"><br>
                            <button type="button" id="upload_button" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Загрузить</button>
                        </div></br>
                        <div class="form-inline">
                            <label>Заголовок</label></br>
                            <input type="text" id="title" class="form-control" placeholder=""/>
                        </div></br>
                        <div class="form-inline">
                            <label>Текст</label></br>
                            <textarea type="text" class="form-control" id="text" rows="5" placeholder=""></textarea>
                        </div></br>

                        <button type="button" id="save" class="btn btn-primary " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-saved"></span> Сохранить / Закрыть</button>
                        <button type="button" id="update" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-refresh"></span> Обновить / Закрыть</button>

                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Модальное окно!-->

    <div class = "container-fluid" id="data"></div>

</div>





<script src="/bootstrap/js/jquery3.3.1.js"></script>
<script src="/bootstrap/js/ajax.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>