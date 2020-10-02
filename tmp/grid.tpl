<div class='item col-md-4' style='text-align: center'>

    <a href="/<?=$row['id_num']?>" title="Нажмите"><img src="up_img/<?=$row['image']?>" class='img-circle' width='270' height='270'></a>
    <div class='caption'><br>
        <h3 class='group inner list-group-item-heading'><?=Functions::string_replace($row['title'], 20)?></h3>
        <h4 class='group inner list-group-item-text'><?=Functions::string_replace($row['text'], 30)?></h4>
        <h6 class='group inner list-group-item-text'><?=$row['datetime']?></h6>
        <div class='row'><br>
            <div class='.col-md-6'>
                <button class='btn btn-primary btn-sm' data-toggle='modal' data-target="#view_modal<?=$row['id_num']?>" name="<?=$row['id_num']?>"><span class='glyphicon glyphicon-search'></span> Просмотр</button>
                <button class='btn btn-danger btn-sm delete' name="<?=$row['id_num']?>"><span class='glyphicon glyphicon-trash'></span> Удалить</button><p></p>
            </div>
        </div>
    </div>
</div>
<?require $_SERVER['DOCUMENT_ROOT'] . '/tmp/modal.tpl'?>