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
        width: 90%;
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
        width: 50%;
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
        width: 50%;
    }
    .p_answer{
        width: 50%;
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
        <div><input class="head" type="text" name="form_head" placeholder="Untitled form" id="form_head"/></div>
        <br>
        <div><input class="desc" type="text" name="form_desc" placeholder="form description" id="form_desc"/></div>
    </div>

    <div class="add_form_body">
        <div id="1" class="def" style="display: flex;">
            <div class="add_question">
                <div style="display: flex;">
                    <input class="question" type="text" name="form_question" placeholder="Question" />
                    <select class="d_drop">
                        <?php foreach($input_types as $input_type) {?>
                            <option value="<?=$input_type->input_type;?>"><?=$input_type->input_type;?></option>
                        <?php }?>
                    </select>
                </div>
                <br>
                <div style="display: flex;">
                    <div class="p_answer"><label class="answer">Answer</label></div>
                    <div class="p_answer_1"><label class="answer">Required</label> <input type="checkbox" class="required_tgl"></div>
                </div>
            </div>
            <input type="button" value="+" class="add_more_btn add_question_q" id="add_question_1"/>
        </div>
    </div>

    <div style="display: flex; justify-content: space-around; width: 100%; padding: 2vw;">
        <input type="button" id="cancel_btn" value="cancel" style="padding: 1vw; font-size: 1.4vw;">
        <input type="button" id="save_btn" value="Save" style="padding: 1vw; font-size: 1.4vw;">
    </div>
    </section>
</body>
</html>


<script>
    var input_types = <?php echo json_encode($input_types); ?>;
    var num = 2;
    var id_array = [1];
    // var question_array = {'type': 'Textbox', 'question': 'answer'};
    var data_array = {1: {'type': 'Textbox', 'question': '', 'required': '0'}};

    function changetype(id, type, crr_id)
    {
        if(type == 'Textbox')
        {
            data_array[id] = {'type': type, 'question': data_array[id]['question'], 'required': data_array[id]['required']}
        }
        else
        {
            data_array[id] = {'type': type, 'question': data_array[id]['question'], 'options': {[crr_id]: 'option 1'}, 'required': data_array[id]['required']}
        }

        console.log(data_array);
        return;
    }

$(document).ready(function(){
    //add question.
    $(document).on('focus', '.add_question', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        $('.add_question_q').hide();
        $('#add_question_'+parent_id).show();
    });

    $(document).on('click', '.add_question', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        $('.add_question_q').hide();
        $('#add_question_'+parent_id).show();
    });

    $(document).on('click', '.add_question_q', function() {
        
        // console.log(input_types);
        // return;
        var add_q_text = `<div id="`+num+`" class="def" style="display: flex;">
            <div class="add_question">
                <div style="display: flex;">
                    <input class="question" type="text" name="form_question" placeholder="Question" />
                    <select class="d_drop" ><?php foreach($input_types as $input_type) {?>
                            <option value="<?=$input_type->input_type;?>"><?=$input_type->input_type;?></option>
                        <?php }?>
                    </select>
                </div>
                <br>
                <div style="display: flex;">
                    <div class="p_answer"><label class="answer">Answer</label></div>
                    <div class="p_answer_1"><label class="answer">Required</label> <input type="checkbox" class="required_tgl"></div>
                </div>
            </div>
            <input type="button" value="+" class="add_more_btn add_question_q" id="add_question_`+num+`"/>
        </div>`;
        
        $('.add_form_body').append(add_q_text);

        data_array[num] = {'type': 'Textbox', 'question': '', 'required': '0'}

        num+=1;
        // console.log('g');
    });

    //change required.
    $(document).on('change', '.required_tgl', function() {
        var parent_id = $(this).closest('div.def').attr('id');

        if ($(this).prop('checked')) {
            data_array[parent_id]['required'] = '1';
        } else {
            data_array[parent_id]['required'] = '0';
        }

        console.log(data_array);
    });

    //change questions.
    $(document).on('change', '.question', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        var val = $(this).val();

        data_array[parent_id]['question'] = val;
        console.log(data_array);
    });

    //change options.
    $(document).on('change', '.answer_1', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        var id = $(this).attr('id');
        var val = $(this).val();
        var crr_id = $(this).closest('.options').find('.hidden_id').val();

        data_array[parent_id]['options'][crr_id] = val;
        console.log(data_array);
    });

    //add more for radio button.
    $(document).on('click', '.myradio', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        var crr_id = $(this).closest('.options').find('.hidden_id').val();
        var id = $(this).attr('id');
        
        var prev_div = $(this).closest('.p_answer');
        $(this).closest('.op').remove();
        prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="Radio Button"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="radio" disabled><input class="answer_1" required placeholder="Option" type="text" id="radio'+parent_id+num+'"> </div>');
        num+=1;
        prev_div.append('<div style="display: flex;" class="op"> <input type="radio" disabled><input class="myradio" placeholder="Add More" type="text" id="radio'+id+'"> </div>');
    });

    //add more for check box.
    $(document).on('click', '.mycheck', function() {
        // alert("Textbox is focused!");
        // console.log('g');
        var parent_id = $(this).closest('div.def').attr('id');
        var crr_id = $(this).closest('.options').find('.hidden_id').val();
        var id = $(this).attr('id');
        
        var prev_div = $(this).closest('.p_answer');
        $(this).closest('.op').remove();
        prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="CheckBox"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="checkbox" disabled><input class="answer_1" required placeholder="Option" type="text" id="check_'+parent_id+num+'"> </div>');
        num+=1;
        prev_div.append('<div style="display: flex;" class="op"> <input type="checkbox" disabled><input class="mycheck" placeholder="Add more" type="text" id="check_'+parent_id+'"> </div>');
    });

    //add more for dropdown.
    $(document).on('click', '.mydrop', function() {
        // alert("Textbox is focused!");
        // console.log('g');
        var parent_id = $(this).closest('div.def').attr('id');
        var crr_id = $(this).closest('.options').find('.hidden_id').val();
        var id = $(this).attr('id');
        
        var prev_div = $(this).closest('.p_answer');
        $(this).closest('.op').remove();
        prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="Dropdown"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="checkbox" disabled><input class="answer_1" required placeholder="Option" type="text" id="option'+parent_id+num+'"> </div>');
        num+=1;
        prev_div.append('<div style="display: flex;" class="op"> <input type="checkbox" disabled><input class="mydrop" placeholder="Add more" type="text" id="option'+parent_id+'"> </div>');
    });


    //when input type change.
    $(document).on('change', '.d_drop', function() {
        var parent_id = $(this).closest('div.def').attr('id');
        // console.log(parent_id);
        // return;
        if($(this).val() == 'Textbox')
        {
            var prev_div = $(this).closest('.add_question').find('.p_answer');
            prev_div.empty();
            prev_div.append('<label class="answer">Answer</label>');
            changetype(parent_id, 'Textbox', '')
        }
        else if($(this).val() == 'Radio Button')
        {
            var parent_id = $(this).closest('div.def').attr('id');       
            var prev_div = $(this).closest('.add_question').find('.p_answer');
            prev_div.empty();
            prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="Radio Button"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="radio" disabled><input class="answer_1" required placeholder="Option" type="text" id="radio'+parent_id+num+'"> </div>');
            num+=1;
            prev_div.append('<div style="display: flex;" class="op"> <input type="radio" disabled><input class="myradio" placeholder="Add more" type="text" id="radio'+parent_id+'"> </div>');
            // changetype(parent_id, 'Radio Button')
            var crr_id = $('.p_answer').find('.options').find('input.hidden_id').val();
            // console.log(parent_val);
            changetype(parent_id, 'Radio Button', crr_id);
        }
        else if($(this).val() == "CheckBox")
        {
            var parent_id = $(this).closest('div.def').attr('id');
            var prev_div = $(this).closest('.add_question').find('.p_answer');
            prev_div.empty();
            // prev_div.append('<label class="answer">dropdown</label>');
            prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="CheckBox"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="checkbox" disabled><input class="answer_1" required placeholder="Option" type="text" id="check_'+parent_id+num+'"> </div>');
            num+=1;
            prev_div.append('<div style="display: flex;" class="op"> <input type="checkbox" disabled><input class="mycheck" placeholder="Add more" type="text" id="check_'+parent_id+'"> </div>');
            // changetype(parent_id, 'CheckBox')
            // var crr_id = $(this).closest('.p_answer').find('.hidden_id');
            var crr_id = $('.p_answer').find('.options').find('input.hidden_id').val();
            changetype(parent_id, 'CheckBox', crr_id);
        }
        else if($(this).val() == "Dropdown")
        {
            var parent_id = $(this).closest('div.def').attr('id');
            var prev_div = $(this).closest('.add_question').find('.p_answer');
            prev_div.empty();
            prev_div.append('<div style="display: flex;" class="options"><input class="hidden" type="hidden" value="Dropdown"><input class="hidden_id" type="hidden" value="'+num+'"> <input type="checkbox" disabled><input class="answer_1" required placeholder="Option" type="text" id="option'+parent_id+num+'"> </div>');
            num+=1;
            prev_div.append('<div style="display: flex;" class="op"> <input type="checkbox" disabled><input class="mydrop" placeholder="Add more" type="text" id="option'+parent_id+'"> </div>');
            // changetype(parent_id, 'Dropdown')
            // var crr_id = $(this).closest('.options').find('.hidden_id');
            var crr_id = $('.p_answer').find('.options').find('input.hidden_id').val();
            changetype(parent_id, 'Dropdown', crr_id);
        }
    });


    $(document).on('click','#save_btn', function(){

        let inputs = document.querySelectorAll('.question');

        inputs.forEach(function(input) {
            let inputValue = input.value.trim();

            if (inputValue === '') {
                input.style.border = '1px solid';
                input.style.borderColor = 'red';
                alert('Invalid questions ..');
                return;
            }
            else{
                input.style.border = 'none';
            }
        });

        
        if ($('#form_head').val().trim() === '') {
            $('#form_head').css('border', '1px solid red');
            alert('Invalid description ..');
            return;
        }
        else{
            $('#form_head').css('border', 'none');
        }

        
        if ($('#form_desc').val().trim() === '') {
            $('#form_desc').css('border', '1px solid red');
            alert('Invalid heading ..');
            return;
        }
        else{
            $('#form_desc').css('border', 'none');
        }


        let input = document.querySelectorAll('.answer_1');

        input.forEach(function(input) {
            let inputValue = input.value.trim();

            if (inputValue === '') {
                input.style.border = '1px solid';
                input.style.borderColor = 'red';
                alert('Invalid options ..');
                return;
            }
            else{
                input.style.border = 'none';
            }
        });

        console.log(JSON.stringify(data_array));
        
        $.ajax({
        url: '<?=base_url();?>add/forms',
        method: 'POST',
        data: {
            'data': JSON.stringify(data_array),
            'form_head': $('#form_head').val(),
            'form_desc': $('#form_desc').val(),
        },
        success: function(res){
            alert('Form saved ..');
            window.location.href = '<?=base_url();?>all/forms';
        },
        error: function(xhr, status, error){
            console.log('false');
            return;
        }
        });
    });
});
</script>