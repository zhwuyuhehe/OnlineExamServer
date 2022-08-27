<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
    <title>题目</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../font/iconfont.css"/>
    <script src="../js/jquery-3.4.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/common.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="container_exam">
<div class="exam_group">
    <div class="_title"></div>
    <div class="_body">
        <label for="ele_textarea"></label><textarea class="exam_textarea _hidden _item" id="ele_textarea"></textarea>
        <div id="_radio" class="_hidden _item"></div>
        <div id="_checkbox" class="_hidden _item"></div>
        <button type="button" class="_btn _next " onclick="nextExam()">下一题</button>
    </div>
</div>
<div class="_back" onclick="goBack()">
    <i class="iconfont icon-fanhui"></i>
</div>
<script type="text/javascript">
    let score = 0;
    let index = 0;
    //let examList = <?php
    //        $conn = new mysqli("8.142.76.205", "root", "ZHANGhao2002", "sky");
    //        $result = $conn->query("SELECT * FROM `sky`.`question_data` WHERE examNum='1'");
    //        $rows = $result->fetch_all(MYSQLI_ASSOC);
    //        if ($rows){
    //            foreach ($rows as $row){
    //                $examList=$row['examList'];
    //                echo $examList;
    //           }
    //        }
    //        else echo '未获取到题目';
    //         ?>


       let examList = [{
        num: '1',
        type: '1', //1---文本题；2---单选择题；3---多选择题；
        title: '‘1+1’的答案是什么？',
        val: '',
        tans:'2',
        element: 'ele_textarea'
    },
        {
            num: '2',
            type: '2', //1---文本题；2---单选择题；3---多选择题；
            title: '以下情况哪个是对的？',
            list: [{
                key: 'A',
                str: '天是蓝的'
            }, {
                key: 'B',
                str: '草是黑的'
            }, {
                key: 'C',
                str: '小鸟会说话'
            }, {
                key: 'D',
                str: '我不知道'
            }],
            val: '',
            tans: 'A',
            element: 'ele_radio'
        },
        {
            num: '3',
            type: '3', //1---文本题；2---单选择题；3---多选择题；
            title: '以下情况哪个是错的？',
            list: [{
                key: 'A',
                str: '天是蓝的'
            }, {
                key: 'B',
                str: '草是黑的'
            }, {
                key: 'C',
                str: '小鸟会说话'
            }],
            val: '',
            tans: 'B,C',
            element: 'ele_checkbox'
        },
        {
            num: '4',
            type: '1',
            title: '这是一道填空题~答案是4啊',
            val: '',
            tans: '4',
            element: 'ele_textarea'
        }
    ];

    function reduceShow() {

        let nowExamItem = examList[index];
        console.log(index, " ==index ", nowExamItem);
        $('.exam_group>._title').text((index + 1) + '.' + nowExamItem.title);
        $('.exam_group>._body>._item').addClass('_hidden');
        switch (nowExamItem.type) {
            case '1':
                $('#ele_textarea').val('').removeClass('_hidden');  //清除做过的题的选项内容，显示文本域
                break;
            case '2':
                let content2 = "";
                let name2 = 'ele_radio' + index;
                nowExamItem.list.forEach(e => {
                    content2 += '<div class="_line"><input type="radio" name="' + name2 + '" value="' + e.key + '" />' + e.str + '</div>';
                });
                $('#_radio').empty().append(content2).removeClass('_hidden');    //清除做过的题的选项内容，显示单选框，加入题的题目
                console.log(content2, " ===content2");
                break;
            case '3':
                let content3 = "";
                let name3 = 'ele_checkbox' + index;
                nowExamItem.list.forEach(e => {
                    content3 += '<div class="_line"><input type="checkbox" name="' + name3 + '" value="' + e.key + '" />' + e.str + '</div>';
                });
                $('#_checkbox').empty().append(content3).removeClass('_hidden');   //清除做过的题的选项内容，显示单选框，加入题的题目
                console.log(content3, " ===content3");
                break;
        }
    }

    function nextExam() {
        let now = examList[index].element;
        console.log(now, "  ===now", index, examList[index].type)
        switch (examList[index].type) {
            case '1':
                if ($('#' + now).val()) {
                    examList[index].val = $('#' + now).val();//用户取回的答案
                    next();
                } else {
                    noVal();
                    return false;
                }
                break;
            case '2':
                let name1 = 'ele_radio' + index;
                now = "input[name=" + name1 + "]";
                console.log(now, "  ===now ", $(now + ':checked').val());
                if ($(now + ':checked').val()) {
                    examList[index].val = $(now + ':checked').val();
                    next();
                } else {
                    noVal();
                    return false;
                }
                break;
            case '3':
                let name2 = 'ele_checkbox' + index;
                now = "input[name=" + name2 + "]";
                let arr = $(now + ':checked').map(function () {
                    return $(this).val();
                });
                arr = [...arr];
                if (arr && arr.length > 0) {
                    examList[index].val = arr.join(',');
                    next();
                } else {
                    noVal();
                    return false;
                }
                break;
        }
    }

    function noVal() {
        layer.msg('答案不可为空！');
    }

    function next() {
        if (index === examList.length - 1) {
            end();
        } else {
            ++index;
            reduceShow();
        }
    }

    function end() {
        console.log(examList.map(e => {
            if (e.val == e.tans){
                score++;
            }
            return e.val
        }), "  ====答案")

        layer.alert('答题结束!你的得分为：' + score);
    }

    reduceShow(); //第一次题目·
    function goBack() {
        location.href = "index.php";
    }
</script>
</body>
</html>
