
<div class="row">
    <?php 
    if(!empty(validation_errors())){
        $errors= validation_errors();
    }else if(!empty ($result) && $result=="Failed"){
        $errors= $error_message;
    }
    if(!empty($errors)){
        ?>
    
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <?php echo $errors; ?>
        </div>
        <?php
    }
    
    if(!empty($result) && $result=='Success'){
        ?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Success!</strong> News has been added!
        </div>
        <?php
    }
      echo form_open_multipart('','class="form-horizontal" '); 
      ?>
      <div class="form-group">
        <label class="control-label col-sm-1" for="title">Title</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1" for="slug">Slug</label>
        <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"></div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1" for="description">Description</label>
        <div class="col-sm-10"><textarea class="form-control" rows="5" id="description" name="description"></textarea></div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1" for="image">Image</label>
        <div class="col-sm-10"><input type="file" id="image" name="image"></div>
      </div>
        <div class="form-group">
        <label class="control-label col-sm-1"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-default">Submit</button></div>
      </div>
      
    </form>
</div>