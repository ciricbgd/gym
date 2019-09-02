@extends('admin_panel')
@section('admin_page')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>@foreach($survey_name as $name)
                        {{$name->name}}
                    @endforeach</th>
            </tr>
        </thead>
        <tbody>
            @foreach($survey_questions as $question)
                <tr>
                    <td>{{$question->name}}</td>
                        @foreach($survey_answers as $answer)
                            @if($answer->question_id==$question->id)
                                <td>
                                    {{$answer->name}}:
                                    <?php $i=0;?>
                                    @foreach($survey_results as $result)
                                        @if($result->answer_id == $answer->id)
                                            <?php $i++;?>
                                        @endif
                                    @endforeach
                                    <?php echo $i;?>
                                </td>
                            @endif
                        @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection