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
                        <form id="form1" action="<?php echo site_url('batch/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                            <option>2029</option>
                                            <option>2030</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('start_year'); ?></span>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control" name="start_month">
                                            <option>Select Month</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
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
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                            <option>2029</option>
                                            <option>2030</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('end_year'); ?></span>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control" name="end_month">
                                            <option>Select Month</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
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
                                    <th><?php echo $this->lang->line('end_period') ; ?></th>
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
                                        <td class="mailbox-name"><?php echo $batch['end_year'].'/'.$batch['end_month'] ?></td>

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