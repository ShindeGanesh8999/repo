<?php // print_r($submissions);?>

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
        <div class="add_form_head">
            <input type="hidden" name="" id="form_id" value="<?=$form_data[0]->form_id;?>">
            <div class="head"><?=$form_data[0]->title;?></div>
            <br>
            <div class="desc"><?=$form_data[0]->description;?></div>
        </div>

        <div class="add_form_body">
            <div class="add_question" id="mobile_div" style="margin: 2vw 0vw 0vw 2vw;">
                <div style="display: flex;">
                    <div class="question" >Mobile number</div>
                </div>
                <br>
                <div style="display: flex;">
                    <div class="p_answer">
                        <?=$submissions[0]->mobile;?>
                    </div>
                </div>
            </div>

            <?php $cnt = 1; foreach($submissions as $question){
                ?>
                <div class="def" style="display: flex;">
                    <div class="add_question">
                        <div style="display: flex;">
                            <div class="question">Question <?=$cnt;?>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach(json_decode($question->question) as $q) print_r($q->question);?></div>
                        </div>
                        <br>
                        <div style="display: flex;">
                            <div class="p_answer" style="font-size: 1.5vw;">
                                Answer:-> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$question->answer;?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $cnt+=1; }?>
        </div>
        <div style="display: flex; justify-content: space-around; width: 100%; padding: 2vw;">
    </div>
    </section>
</body>
</html>