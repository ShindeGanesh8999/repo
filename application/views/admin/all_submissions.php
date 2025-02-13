<?php // print_r($input_types);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .head{
        font-size: 3vw;
        font-weight: normal;
        border: none;
        width: 100%;
    }
    .add_form_head{
        padding: 2vw;
        width: 100%;
        border: 1px solid;
        border-radius: 20px;
        margin-left: 2vw;
    }
    .add_question{
        padding: 2vw;
        width: 100%;
        border: 1px solid;
        border-radius: 20px;
    }
    .desc{
        font-size: 1.8vw;
        font-weight: normal;
        border: none;
        width: 100%;
    }
    .question{
        font-size: 1.7vw;
        font-weight: normal;
        border: none;
        width: 100%;
    }
    .d_drop{
        font-size: 1.7vw;
        font-weight: normal;
        border: none;
        width: 50%;
    }
    .add_more_btn{
        font-size: 4vw;
        margin: 0vw 0vw 0vw 2vw;
        padding: 0vw 1vw;
        max-height: 5vw;
        
    }
    .def{
        margin: 1.5vw 0vw 0vw 2vw;
        width: 100%;
    }
    .answer{
        font-size: 1.5vw;
        font-weight: normal;
        border: none;
        width: 45%;
    }
    .answer_1{
        font-size: 1.5vw;
        font-weight: normal;
        border: none;
        padding-left: 0.7vw;
    }
    .mycheck, .myradio, .mydrop{
        font-size: 1.5vw;
        font-weight: normal;
        border: none;
        padding-left: 0.7vw;
    }
    .p_answer_1{
        /* width: 100%; */
    }
    .p_answer{
        width: 100%;
    }
    .required_tgl{
        font-size: 2vw;
    }
</style>
</head>
<body style="display: flex;">
    <section style="width: 25vw; height: 100vh; background-color: orange; display: flex; width: 27%; justify-content: center;">
        <div style="min-width: 5vw; padding: 3vw;">
            <a href="<?=base_url();?>all/forms" style="text align: center;" class="btn btn-Secondary">All Forms</a><br>
            <a href="<?=base_url();?>open/add/form" style="text align: center;" class="btn btn-Secondary">Add Forms</a><br>
            <a href="<?=base_url();?>all/submissions" style="text align: center;" class="btn btn-Secondary">All Submissions</a><br>
        </div>
    </section>
    <section style="width: 66vw; height: 100vh; background-color: white;">
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>user_id</th>
                        <th>form_id</th>
                        <th >open</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($all_submissions as $submission){?>
                    <tr>
                        <td><?=$submission->answer_id; ?></td>
                        <td><?=$submission->user_id;?></td>
                        <td><?=$submission->form_id;?></td>
                        <td><a href="<?=base_url();?>get/submission/<?=$submission->form_id;?>/<?=$submission->user_id;?>">Open</a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#save_btn').click(function(){
            var form_data = [];
            var type;
            var opt;
            var ques_id;
            var temp = {};

            var mobile = $("#mobile").val().trim();
            var form_id = $("#form_id").val();
            var regex = /^[6-9][0-9]{9}$/;
            if (!regex.test(mobile)) {
                $("#mobile_div").css("border-color", "red");
                alert('Please enter valid mobile number');
                return;
            }
            for(var i=1; i<=4; i++)
            {
                
                temp ={};
                type = $("#hid_"+i).val();
                ques_id =$("#qus_"+i).val();
                temp['question_id'] = ques_id;
                // temp['type'] = type;
                // console.log(type);
                var req = $('#req_'+i).val();
                // if($('#req_'+i).val() == 1)
                // {
                    if(type == 'Textbox'){
                        var opt = $(".opt_" + i).val().trim();
                        if(opt == '' && req == 1) {
                            $("#"+i).find('.add_question').css("border-color", "red");
                            alert('Please enter valid input');
                            return;
                        }
                        temp['answer'] = opt;

                    }
                    else if(type == 'Radio Button')
                    {
                        var opt = $("input[name='opt_"+i+"']:checked").val();
                        if (opt || req == 0) {
                            temp['answer'] = opt;
                        } else {
                            $("#"+i).find('.add_question').css("border-color", "red");
                            alert("No option selected");
                            return;
                        }
                    }
                    else if(type == 'CheckBox')
                    {
                        var opt = [];
        
                        $('input[name="opt_'+i+'"]:checked').each(function() {
                            opt.push($(this).val());
                        });
                        
                        if (opt.length > 0 || req == 0) {
                            temp['answer'] = opt;
                        } else {
                            alert("No options selected.");
                            $("#"+i).find('.add_question').css("border-color", "red");
                            return;
                        }
                    }
                    else if(type == 'Dropdown')
                    {
                        var opt = $('#opt_'+i).val();
        
                        if (opt || req == 0) {
                            temp['answer'] = opt;
                        } else {
                            alert("No option selected.");
                            $("#"+i).find('.add_question').css("border-color", "red");
                            return;
                        }
                    }

                    form_data.push(temp);
                // }
                // else {
                //     temp['answer'] = '';
                // }

            }

            // console.log(JSON.stringify(form_data));
            // return;

            $.ajax({
            url: '<?=base_url();?>user/fill/forms',
            method: 'POST',
            data: {
                'data': JSON.stringify(form_data),
                'mobile': mobile,
                'form_id': form_id,
            },
            success: function(res){
                // console.log(res);
                if(res == 'already Exist')
                {
                    alert('user already submit form ..');
                }
                else
                {
                    alert('Form saved ..');
                }
                
                location.reload();
            },
            error: function(xhr, status, error){
                console.log('false');
                return;
            }
            });
        });
    });
</script>