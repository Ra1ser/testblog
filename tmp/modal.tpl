
<div class='modal fade' id="view_modal<?=$row['id_num']?>" style='text-align: center' role='dialog'>
<div class='modal-dialog modal-lg'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h2 class='modal-title'><?=$row['title']?></h2>
        </div>
        <div class='modal-body'>
            <img src="up_img/<?=$row['image']?>" class='img-rounded' width='650' height='650'>
            <h4><?=$row['text']?></h4>
            <h6><?=$row['datetime']?></h6>
        </div>
        <div class='modal-footer' style='text-align: center'>
            <button class='btn btn-warning btn-sm edit'   data-dismiss='modal' data-toggle='modal' data-target='#add_edit' name="<?=$row['id_num']?>"> <span class='glyphicon glyphicon-pencil'></span> Редактировать</button>
        </div>
    </div>
</div>
</div>