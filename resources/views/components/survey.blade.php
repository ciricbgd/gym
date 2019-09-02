@if(!empty($surveys))
    @foreach($surveys as $survey)
        <div class="card survey_card">
            <form action="{{route('survey.submit')}}" method="POST" class="form form-horizontal survey_form" data-survey-id="{{$survey->id}}">
                {{csrf_field()}}
                <ul class="survey">
                    @foreach($questions as $question)
                        @if($question->survey_id==$survey->id)
                            <li>
                                <h6>Question #{{$loop->iteration}}</h6>
                                <h4>{{$question->name}}</h4>
                                <div class="form-check">
                                    @foreach($answers as $answer)
                                        @if($answer->question_id==$question->id)
                                            <input class="form-check-input" type="{{$question->answer_format}}"name="{{$question->id}}" data-survey-id="{{$survey->id}}" data-question-id="{{$question->id}}" value="{{$answer->id}}">
                                            <label class="form-check-label">{{$answer->name}}</label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
                        <li>
                            <h4 style="width:100%;text-align:center;">Thank you for your time</h4>
                            <br><br>
                            <button type="button" class="btn btn-outline-primary survey_submit" data-survey-id="{{$survey->id}}">Submit</button>
                        </li>
                </ul>
            </form>
        </div>
    @endforeach
@endif