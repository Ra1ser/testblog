<div class='row featurette'>
<div class='col-md-7 col-md-push-5'>
    <h2 class='featurette-heading'><span class='text-muted'><?=$row['title']?></span></h2>
    <p class='lead'><?=Functions::string_replace($row['text'], 50)?></p>
    <h6><?=$row['datetime']?></h6>
    <br>
    <button class='btn btn-primary btn-sm' data-toggle='modal' data-target="#view_modal<?=$row['id_num']?>" name="<?=$row['id_num']?>"><span class='glyphicon glyphicon-search'></span> Просмотр</button>
    <button class='btn btn-danger btn-sm delete' name="<?=$row['id_num']?>"><span class='glyphicon glyphicon-trash'></span> Удалить</button>
</div>
<div class='col-md-5 col-md-pull-7'>
    <a href="/<?=$row['id_num']?>" title="Нажмите"><img src="up_img/<?=$row['image']?>" class="img-thumbnail img-responsive center-block" style= "width: 200px; height: 200px;"></a>
</div>
</div><br>
<?require $_SERVER['DOCUMENT_ROOT'] . '/tmp/modal.tpl'?>
