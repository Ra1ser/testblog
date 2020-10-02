<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">TEST BLOG</a>
        </div>
        <ul class="nav navbar-nav">
            <a href="/"><button type="button" class="btn btn-warning navbar-btn"><span class="glyphicon glyphicon-arrow-left"></span></button></a>
        </ul>
    </div>
</nav>
<div style="text-align: center;">
    <h1><?=DataBase::page($page, 1);?></h1>
    <img src="/up_img/<?=DataBase::page($page, 3);?>" class="img-thumbnail img-responsive center-block" style= "width: 750px; height: 750px;">
    <h3><?=DataBase::page($page, 2);?></h3>
    <h4><?=DataBase::page($page, 4);?></h4>
</div>