<?php
$templates = [ 
    'nextActive' => '<a class="page-link" href="{{url}}">{{text}}</a>',
    'nextDisabled' => '<a class="page-link" href="{{url}}" aria-disabled="true">{{text}}</a>',
    'prevActive' => '<a class="page-link" href="{{url}}" tabindex="-1" >{{text}}</a> ',
    'prevDisabled' => '<a class="page-link" href="{{url}}" tabindex="-1" aria-disabled="true">{{text}}</a>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="">{{text}}</a></li>',
    ];
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header d-flex justify-content-between">
                        <h2 style="font-size:22px; font-weight:bold">Contact Groups</h2>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm pull-right" id="button" type="submit" value="add" onClick="document.location.href='<?php echo $this->Url->build(array('controller' => 'contacts','action' => 'index')); ?>'; return false;"><i class="fa fa-list"></i> Contacts </button> 
                            <button style="margin-right: 10px !important"   class="btn btn-primary btn-sm pull-right" id="btn-add-group"><i class="fa fa-plus-square"></i> Add Group </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table class="table table-bordered">
                            <thead style="background-color: rgba(0,0,0,.05);">
                            <tr>
                                <th>Group name</th>
                                <th>Total Contacts</th>
                                <th class="actions">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($contactGroups as $contactGroup): ?>
                                <tr>
                                    
                                    <td><?= $contactGroup->group_name ?></td>
                                    <td><?= $total_contacts[$contactGroup->id] ?></td>
                                    <td class="actions">
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-secondary btn-sm edit-btn" data-name="<?= $contactGroup->group_name ?>"  data-id="<?= $contactGroup->id ?>">
                                              <i class="fa fa-edit"></i>  Edit
                                            </button>
                                            
                                            <?= $this->Form->postLink('<i class="fa fa-trash"></i> Delete', array('action' => 'delete', $contactGroup->id), array('class' => 'btn btn-danger btn-sm ml-2', 'escape' => false, 'confirm' => 'Are you sure to delete this contact group')); ?>

                                            <a href="<?= $this->Url->build(['controller' => 'ContactGroups', 'action' => 'export', $contactGroup->id]) ?>" class="btn btn-info btn-sm ml-2">
                                              <i class="fa fa-download"> Export</i>
                                            </a>


                                            <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'add', $contactGroup->id]) ?>" class="btn btn-primary btn-sm ml-2">
                                              <i class="fa fa-plus-square"> Add Contact</i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>  
                        <ul class="pagination">
                              <li class="page-item disabled">
                                  <?php echo $this->Paginator->prev('Previous',['templates'=>$templates]); ?>
                              </li>
                              <?php echo $this->Paginator->numbers(['templates'=>$templates]); ?>
                              <li class="page-item">
                                  <?php echo $this->Paginator->next('Next',['templates'=>$templates]); ?>
                              </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<div class="modal" id="group-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Contact Groups</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <?= $this->Form->create(null, ['controller' => 'ContactGroups', 'action' => 'add', 'id' => 'modal-form']) ?>
        <div class="form-group">
          <label for="group-name">Group Name</label>
          <input type="text" class="form-control" name="group_name" id="group-name" required placeholder="Group Name"> 
        </div>
        <?= $this->Form->end() ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit">Save changes</button>
      </div>
      
    </div>
  </div>
</div>

<?php $this->start('script') ?>
<script>
  $(document).ready(function(){
    let add_url = '<?= $this->Url->build(["controller" => "ContactGroups", "action" => "add"]) ?>'
    let edit_url = '<?= $this->Url->build(["controller" => "ContactGroups", "action" => "edit"]) ?>'

    // console.log(add_url);
    // console.log(edit_url)
    $("#btn-add-group").click(function(){
      $("#modal-form").trigger("reset");
      $('input[name="_method"]').val("POST"); 
      $("#modal-form").attr("action", add_url);
      $("#group-modal").modal();
    });

    $(".edit-btn").click(function(e) {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $("#modal-form").trigger("reset");
        $('input[name="_method"]').val("PUT"); 
        $('input[name="group_name"]').val(name); 
        $("#modal-form").attr("action", edit_url + "/" + id);
        $("#group-modal").modal();

    });



    $(".btn-submit").click(function(e){
      if($("#group-name").val().trim().length !== 0){
        $("#modal-form").submit();
      }
    })
  });
</script>
<?php $this->end() ?>