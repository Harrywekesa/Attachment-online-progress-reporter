<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar-times-o"></i> <?php echo $this->lang->line('class_elogbook'); ?> </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">

                <div class="box box-warning">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('class_elogbook'); ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="timeline-header no-border">
                            <div id="timeline_list">

                                <?php if(empty($attachment_record)){?>
                                    <div class="alert alert-danger">
                                        <p>Attachment Log Book Is not active</p>
                                    </div>
                                <?php } else { ?>
                                    <?php
                                    $stringDate = strtotime($attachment_record['start_date']);
//                                       $lStringDate = strtotime($attachment_record['end_date']);
//                                       $attachmentDate = date('m/d/Y', $stringDate);

                                    $todayDate = date('m/d/Y');

                                    $start_date = date_create($attachment_record['start_date']);
                                    $end_date = date_create($attachment_record['end_date']);

                                    // Step 2: Defining the Date Interval
                                    $interval = new DateInterval('P1D');

                                    // Step 3: Creating the Date Range
                                    $date_range = new DatePeriod($start_date, $interval, $end_date);
                                    ?>
                                    <ul class="timeline timeline-inverse">
                                        <?php
                                        foreach($date_range as $date):

                                            $stringStDate = strtotime($date->format('Y-m-d'));
                                            ?>
                                            <li class="time-label">
                                                <span class="bg-blue"><?php echo $date->format('Y-m-d'); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-list-alt bg-blue"></i>
                                                <div class="timeline-item">

                                                   <span class="time">
                                                       <a data-placement="left" class="defaults-c text-right" data-toggle="tooltip" title="" href="<?php echo base_url() . "user/user/timeline_download/".$attachment_record['id'] ?>" data-original-title="Welcome ">
                                                           <i class="fa fa-download"></i>
                                                       </a>
                                                   </span>

                                                    <h3 class="timeline-header text-aqua">
                                                        <?php
                                                            $dayName = date('M', $stringStDate);
                                                        echo date('M D Y', $stringStDate);
                                                        ?>
                                                    </h3>
                                                    <div class="timeline-body">
                                                        <div class="form-group">
                                                           <textarea id="compose-textarea<?php echo $stringStDate; ?>" name="message<?php echo $stringStDate; ?>" class="form-control" style="height: 300px; background:#F0F0F0; border:0px;" onload="loadUserData(<?php echo $stringStDate; ?>)">
                                                                <?php echo set_value('message'); ?>
                                                           </textarea>
                                                            <span class="text-danger"><?php echo form_error('message'); ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-info pull-right" id="btn<?php echo $stringStDate; ?>" style="margin-top: -5%;"> Save </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <li><i class="fa fa-clock-o bg-gray"></i></li>

                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<script>
    $(function () {

        <?php

        foreach($date_range as $date):
        $stringStDate = strtotime($date->format('Y-m-d'));
        ?>
        var stringDate = '<?php echo $stringStDate; ?>';
        // loadUserData(stringDate);
        // loadUserData(stringDate);
        $("#compose-textarea<?php echo $stringStDate; ?>").wysihtml5();

        <?php endforeach; ?>
    });

    function sampleData(stringDate){
        $('#compose-textarea'+stringDate).val('I am an ordinary person with much qualities');
    }


    function loadUserData(stringDate){
        $.ajax({
            url: "<?php echo site_url("user/elogbook/get_student_log_book_data/") ?>"+stringDate,
            type: "GET",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (res)
            {
                console.log(res);
                $('#compose-textarea'+stringDate).val('I am an ordinary person with much qualities');
                console.log('compose-textarea'+stringDate);
            }
        });
    }

    function newLoading(){
        $.ajax({
            url: "<?php echo site_url("user/elogbook/get_student_log_book_data/") ?>"+stringDate,
            type: "GET",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (res)
            {
                console.log(res);
                $('#compose-textarea'+stringDate).val('I am an ordinary person with much qualities');
                console.log('compose-textarea'+stringDate);
            }
        });
    }
</script>