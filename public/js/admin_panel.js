window.onload = function () {

    //Survey create

    $('#makeSurvey').click(function () {
        var surveyName = $('#surveyName').val();
        var token = $('#surveyForm>input[name="_token"]').val();

        var surveyQuestions = [];
        var surveyAnswers = [];


        $('.questionRow').each(function (index) {
            var question = [];
            var indeks = index + 1;
            question[0] = $(this).find('option:selected').text();
            question[1] = $(this).find('.surveyQuestion').val();
            surveyQuestions.push(question);
        });
        surveyQuestions = JSON.stringify(surveyQuestions);

        $('.surveyAnswer').each(function () {
            var answer = [];
            answer[0] = $(this).data().questionnumber - 1;
            answer[1] = $(this).val();
            surveyAnswers.push(answer);
        });
        surveyAnswers = JSON.stringify(surveyAnswers);

        $.ajax({
            method: "POST",
            url: thisUrl + "/createSurvey",
            data: {
                surveyName: surveyName,
                surveyQuestions: surveyQuestions,
                surveyAnswers: surveyAnswers,
                _token: token,
            },
            success: function () {

            }
        });
    });


    //Survey controls

    $('body').on('click', '.answerRow>.answerDelete', function () {
        $(this).parent().remove();
    });
    $('body').on('click', '.answerRow>.answerAdd', function () {
        var questionNumber = $(this).parent().data().questionnumber;
        var newAnswer = `<div class="answerRow" data-answernumber="` + questionNumber + `">
                            <input type="text" class="form-control surveyAnswer" data-questionnumber="` + questionNumber + `" placeholder="Possible answer">
                            <p class="clickable answerCtrl answerDelete">x</p>
                            <p class="clickable answerCtrl answerAdd">+</p>
                        </div>`;
        $(this).parent().after(newAnswer);
    })


    $('body').on('click', '.questionDelete', function () {
        $(this).parent().remove();
    });
    $('body').on('click', '.questionAdd', function () {
        var lastQuestionNumber = $('.questionRow').length + 1;
        var newQuestion = `<div class="questionRow">
                            <input type="text" class="form-control surveyQuestion" placeholder="Question">
                            <select class="form-control questionOption" data-questionnumber="` + lastQuestionNumber + `">
                                    <option>radio</option>
                                    <option>checkbox</option>
                            </select>
                            <p class="clickable answerCtrl questionDelete">x</p>
                            <p class="clickable answerCtrl questionAdd">+</p>
                            <div class="answerRow" data-questionnumber="` + lastQuestionNumber + `">
                                <input type="text" class="form-control surveyAnswer" data-questionnumber="` + lastQuestionNumber + `" placeholder="Possible answer">
                                <p class="clickable answerCtrl answerDelete">x</p>
                                <p class="clickable answerCtrl answerAdd">+</p>
                            </div>
                            <div class="answerRow" data-questionnumber="` + lastQuestionNumber + `">
                                <input type="text" class="form-control surveyAnswer" data-questionnumber="` + lastQuestionNumber + `" placeholder="Possible answer">
                                <p class="clickable answerCtrl answerDelete">x</p>
                                <p class="clickable answerCtrl answerAdd">+</p>
                            </div>
                        </div>`;
        $(this).parent().after(newQuestion);
    });
    //!Survey create

    //Delete user
    $('.btnDeleteUser').click(function () {
        var uid = $(this).data().uid;
        var token = $('.token[data-uid="' + uid + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/deleteuser",
            data: {
                uid: uid,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Delete user

    //!Edit user
    $('.btnEditUser').click(function () {
        var uid = $(this).data().uid;
        var token = $('.token[data-uid="' + uid + '"]').val();
        var role = $('select[data-uid="' + uid + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/edituser",
            data: {
                uid: uid,
                role: role,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Edit user

    //Delete membership
    $('.btnDeleteMembership').click(function () {
        var mid = $(this).data().mid;
        var token = $('.token[data-mid="' + mid + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/deletemembership",
            data: {
                id: mid,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Delete membership

    //Edit membership
    $('.btnEditMembership').click(function () {
        var mid = $(this).data().mid;
        var token = $('.token[data-mid="' + mid + '"]').val();
        var membershipName = $('.membershipName[data-mid="' + mid + '"]').val();
        var membershipColor = $('.membershipColor[data-mid="' + mid + '"]').val();
        var membershipPrice = $('.membershipPrice[data-mid="' + mid + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/editmembership",
            data: {
                id: mid,
                name: membershipName,
                color: membershipColor,
                price: membershipPrice,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Edit membership

    //Delete showcase
    $('.deleteShowcase').click(function () {
        var id = $(this).data().id;
        var token = $('#token').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/deleteShowcase",
            data: {
                id: id,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Delete showcase

    //Update Showcase
    $('.btnEditShowcase').click(function () {
        var id = $(this).data().id;
        var title = $('.showcaseTitle[data-id="' + id + '"]').val();
        var alt = $('.showcaseAlt[data-id="' + id + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/updateShowcase",
            data: {
                id: id,
                title: title,
                alt: alt,
                _token: $('#token').val(),
            },
            success: function () {
                location.reload();
            }
        });
    });
    //!Update Showcase

    //Delete article
    $('.deleteArticle').click(function () {
        var id = $(this).data().id;
        var token = $('#token').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/deleteArticle",
            data: {
                id: id,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });

    });
    //!Delete article

    //Update article
    $('.btnEditArticle').click(function () {
        var id = $(this).data().id;
        var header = $('.articleHeader[data-id="' + id + '"]').val();
        var alt = $('.articleAlt[data-id="' + id + '"]').val();
        var text = $('.articleText[data-id="' + id + '"]').val();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/editArticle",
            data: {
                id: id,
                header: header,
                alt: alt,
                text: text,
                _token: $('#token').val(),
            },
            success: function () {
                location.reload();
            }
        });
    });
    //!Update article

};
