<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('attachment_batch'); ?>
            <small><?php echo $this->lang->line('class1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('attachment_batch', 'can_add')) {
                ?>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('create_batch'); ?></h3>
                        </div>
                        <form id="form1" action="<?php echo site_url("batch/edit/". $id) ?>"  id="batchEditform" name="batchEditform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('start_date'); ?></label>
                                        <small class="req"> *</small>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="start_year">
                                            <option>Select Year</option>
                                            <option <?php if($batch['start_year'] == '2023') echo 'selected';?>>2023</option>
                                            <option<?php if($batch['start_year'] == '2024') echo 'selected';?>>2024</option>
                                            <option <?php if($batch['start_year'] == '2025') echo 'selected';?>>2025</option>
                                            <option <?php if($batch['start_year'] == '2026') echo 'selected';?>>2026</option>
                                            <option <?php if($batch['start_year'] == '2027') echo 'selected';?>>2027</option>
                                            <option <?php if($batch['start_year'] == '2028') echo 'selected';?>>2028</option>
                                            <option <?php if($batch['start_year'] == '2029') echo 'selected';?>>2029</option>
                                            <option <?php if($batch['start_year'] == '2030') echo 'selected';?>>2030</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('start_year'); ?></span>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control" name="start_month">
                                            <option>Select Month</option>
                                            <option <?php if($batch['start_month'] == '1') echo 'selected';?>>1</option>
                                            <option <?php if($batch['start_month'] == '2') echo 'selected';?>>2</option>
                                            <option <?php if($batch['start_month'] == '3') echo 'selected';?>>3</option>
                                            <option <?php if($batch['start_month'] == '4') echo 'selected';?>>4</option>
                                            <option <?php if($batch['start_month'] == '5') echo 'selected';?>>5</option>
                                            <option <?php if($batch['start_month'] == '6') echo 'selected';?>>6</option>
                                            <option <?php if($batch['start_month'] == '7') echo 'selected';?>>7</option>
                                            <option <?php if($batch['start_month'] == '8') echo 'selected';?>>8</option>
                                            <option <?php if($batch['start_month'] == '9') echo 'selected';?>>9</option>
                                            <option <?php if($batch['start_month'] == '10') echo 'selected';?>>10</option>
                                            <option <?php if($batch['start_month'] == '11') echo 'selected';?>>11</option>
                                            <option <?php if($batch['start_month'] == '12') echo 'selected';?>>12</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('start_month'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group mt5">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('end_date'); ?></label>
                                        <small class="req"> *</small>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="end_year">
                                            <option>Select Year</option>
                                            <option <?php if($batch['end_year'] == '2023') echo 'selected';?>>2023</option>
                                            <option<?php if($batch['end_year'] == '2024') echo 'selected';?>>2024</option>
                                            <option <?php if($batch['end_year'] == '2025') echo 'selected';?>>2025</option>
                                            <option <?php if($batch['end_year'] == '2026') echo 'selected';?>>2026</option>
                                            <option <?php if($batch['end_year'] == '2027') echo 'selected';?>>2027</option>
                                            <option <?php if($batch['end_year'] == '2028') echo 'selected';?>>2028</option>
                                            <option <?php if($batch['end_year'] == '2029') echo 'selected';?>>2029</option>
                                            <option <?php if($batch['end_year'] == '2030') echo 'selected';?>>2030</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('end_year'); ?></span>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control" name="end_month">
                                            <option>Select Month</option>
                                            <option <?php if($batch['end_month'] == '1') echo 'selected';?>>1</option>
                                            <option <?php if($batch['end_month'] == '2') echo 'selected';?>>2</option>
                                            <option <?php if($batch['end_month'] == '3') echo 'selected';?>>3</option>
                                            <option <?php if($batch['end_month'] == '4') echo 'selected';?>>4</option>
                                            <option <?php if($batch['end_month'] == '5') echo 'selected';?>>5</option>
                                            <option <?php if($batch['end_month'] == '6') echo 'selected';?>>6</option>
                                            <option <?php if($batch['end_month'] == '7') echo 'selected';?>>7</option>
                                            <option <?php if($batch['end_month'] == '8') echo 'selected';?>>8</option>
                                            <option <?php if($batch['end_month'] == '9') echo 'selected';?>>9</option>
                                            <option <?php if($batch['end_month'] == '10') echo 'selected';?>>10</option>
                                            <option <?php if($batch['end_month'] == '11') echo 'selected';?>>11</option>
                                            <option <?php if($batch['end_month'] == '12') echo 'selected';?>>12</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('end_month'); ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('student_categories', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('batch_list'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('batch_list'); ?></div>
                        <div class="table-responsive mailbox-messages">
                            <?php if ($this->session->flashdata('msgdelete')) { ?>
                                <?php echo $this->session->flashdata('msgdelete') ?>
                            <?php } ?>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('start_period'); ?></th>
                                    <th><?php echo $this->lang->line('end_period') . " " . $this->lang->line('id'); ?></th>
                                    <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 1;
                                foreach ($batchList as $batch) {
                                    ?>
                                    <tr>
                                        <td class="mailbox-name"><?php echo $batch['start_year'].'/'.$batch['start_month'] ?></td>
                                        <td class="mailbox-name"><?php echo $batch['start_year'].'/'.$batch['start_month'] ?></td>

                                        <td  class="mailbox-date pull-right">
                                            <?php
                                            if ($this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                                ?>
                                                <a data-placement="left" href="<?php echo base_url(); ?>batch/edit/<?php echo $batch['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            <?php } ?>
                                            <?php
                                            if ($this->rbac->hasPrivilege('student_categories', 'can_delete')) {
                                                ?>
                                                <a data-placement="left" href="<?php echo base_url(); ?>batch/delete/<?php echo $batch['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                $count++;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>