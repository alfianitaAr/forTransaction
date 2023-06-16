<?php if ($this->session->flashdata('notification')) { ?>
    <div class="modal fade" id="notification" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?=$this->session->flashdata('notification')?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($this->session->flashdata('notification')) { ?>
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#notification').modal('show');
        });
    </script>
<?php } ?>