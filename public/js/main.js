$(document).ready(function () {
    //Alerts
    if ($('.alert').length > 0) {
        alert($('.alert').text());
    }
    //!Alerts
    //Slow anchor scroll
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 800);
    });
    //!Slow anchor scroll

    //Form check
    function validate(input) {
        input.removeClass('input_warning');
        $('.form_warning').remove();
        $('.registerholder > button').prop('disabled', false);
        var val = input.val();
        var name = input.attr('name');
        var reg;
        var msg;
        switch (name) {
            case 'tbFirstName':
                reg = /^[A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ ,.'-][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
                msg = 'Firstname must be long enough and start with capital letter';
                break;
            case 'tbLastName':
                reg = /^[A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ ,.'-][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
                msg = 'Lastname must be long enough and start with capital letter';
                break;
            case 'tbUsername':
                reg = /^[a-z0-9_\-.]+$/;
                msg = 'Username must be long enough and contain simple characters';
                break;
            case 'tbPassword':
                reg = /^[a-z0-9_\-.]+$/;
                msg = 'Password must be long enough and contain simple characters';
                break;
            case 'tbEmail':
                reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                msg = 'You must provide a valid email address';
                break;
            case 'tbPhone':
                reg = /^[0-9]{7,12}$/;
                msg = 'Your must provide a valid phone number without special characters';
                break;


        }
        if (val != "") {
            if (!val.match(reg)) {
                input.addClass('input_warning');
                $('.registerholder > button').prop('disabled', true);
                $('.registration_row').before('<tr class="form_warning"><td colspan="2"><p class="text-white">' + msg + '</p></td></tr>');
            }
        }

    }

    $('input').keyup(function () {
        validate($(this));
    });
    $('input').change(function () {
        validate($(this));
    });
    //!Form check

    //Login dropdown
    $('body').on('click', '.login_toggle', function () {
        $('#login_form').toggle(250, 'swing');
    });
    //!Login dropdown

    //AJAX survey submit
    $('body').on('click', '.survey_submit', function () {

        var survey_id = $(this).data('survey-id');

        var token = $('form[data-survey-id="' + survey_id + '"]>input[name="_token"]').val();
        var survey = [];

        $("input[data-survey-id='" + survey_id + "']").each(function (i, input) {
            var question_id = $(input).data('question-id');
            if ($(input).prop('checked')) {

                var answer_id = parseInt($(this).val());
                var question = [question_id, answer_id];
                survey.push(question);

            }
        });

        survey = JSON.stringify(survey);

        $.ajax({
            method: "POST",
            url: thisUrl + "/survey",
            data: {
                survey_id: survey_id,
                user_id: userID,
                survey: survey,
                _token: token,
            },
            success: function () {
                location.reload();
            }
        });
    });

    //!AJAX survey submit

    //AJAX pager
    var pagesTotal;
    if ($('#pagerToken').length != 0) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/articlePage",
            data: {
                _token: $('#pagerToken').val(),
            },
            success: function (data) {
                pagesTotal = data / 2;
            }
        });
    }
    var page = 1;
    $('.articleBtnLeft').click(function () {
        page--;
        $('#articlePageNumber').html('page:' + page);
    });
    $('.articleBtnRight').click(function () {
        page++;
        $('#articlePageNumber').html('page:' + page);
    });
    $('.articleBtn').click(function () {
        if (page < 1) {
            page = 1
            $('#articlePageNumber').html('page:' + page);
        };
        if (page > pagesTotal) {
            page = pagesTotal;
            $('#articlePageNumber').html('page:' + page);
        }
        $.ajax({
            method: "POST",
            url: baseUrl + "/getArticle",
            data: {
                page: page - 1,
                _token: $('#pagerToken').val(),
            },
            success: function (data) {
                var articles = '';
                $.each(data, function (i) {
                    articles += `<article>
                                        <h3>` + data[i].header + `</h3>
                                        <img src="` + baseUrl + `/img/articles/` + data[i].img + `" alt="` + data[i].alt + `">
                                        <p>` + data[i].text + `</p>
                                        <a class="btn btn-primary" href="` + baseUrl + `/article/` + data[i].id + `">Read more</a>
                                </article>`;

                });
                $('#articles').html(articles);
            }
        });
    })
    //!AJAX pager
});
