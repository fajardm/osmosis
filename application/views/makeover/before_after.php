<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Before and After</h4>
</div>
<div class="modal-body">
    <?php if (!empty($data)) { ?>
    <div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div id="primary_nav" style="padding-right:0px">
                    <div style="text-align:center; padding:10px; color: #fff">Before</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo $data['before']; ?>" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="col-md-6">
             <div class="row">
                <div class="col-md-12">
                    <div id="primary_nav" style="padding-right:0px">
                        <div style="text-align:center; padding:10px; color: #fff">After</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo $data['after']; ?>" class="img-responsive">
                </div>
            </div>
            
        </div>
    </div>    
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Belum ada photo yang di upload!
        </div>
    <?php } ?>
</div>
