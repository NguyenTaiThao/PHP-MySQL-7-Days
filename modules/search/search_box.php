<?php
    if(isset($_GET['search_box'])){
        $value = $_GET['search_box'];
    }else{
        $value='';
    }
?>
<div id="search" class="col-lg-6 col-md-6 col-sm-12">
    <form class="form-inline">
        <input type="hidden" name="page_layout" value="search">
        <input class="form-control mt-3" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search_box" value='<?php echo $value?>'>
        <button class="btn btn-danger mt-3" type="submit" name="sbm" value=1>Tìm kiếm</button>
    </form>
</div>