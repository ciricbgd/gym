@extends('admin_panel') @section('admin_page')
<div id="surveyForm">
    {{csrf_field()}}
    <input type="text" id="surveyName" placeholder="Survey name" class="form-control">

    <div class="questionRow">
        <input type="text" class="form-control surveyQuestion" placeholder="Question">
        <select class="form-control questionOption" data-questionnumber="1">
                <option>radio</option>
                <option>checkbox</option>
        </select>
        <p class="clickable answerCtrl questionDelete">x</p>
        <p class="clickable answerCtrl questionAdd">+</p>
        <div class="answerRow" data-questionnumber="1">
            <input type="text" class="form-control surveyAnswer" data-questionnumber="1" placeholder="Possible answer">
            <p class="clickable answerCtrl answerDelete">x</p>
            <p class="clickable answerCtrl answerAdd">+</p>
        </div>
        <div class="answerRow" data-questionnumber="1">
            <input type="text" class="form-control surveyAnswer" data-questionnumber="1" placeholder="Possible answer">
            <p class="clickable answerCtrl answerDelete">x</p>
            <p class="clickable answerCtrl answerAdd">+</p>
        </div>
    </div>

    <button role="button" class="btn btn-success" id="makeSurvey">Create survey</button>
</div>





<table class="table table-hover" style="margin-top:50px;">
    @foreach($surveys as $survey)
    <tr>
        <td>{{$survey->name}}</td>
        <td><a href="{{url('/admin/surveys/view/'.$survey->id)}}" role="button" class="btn btn-primary text-light">View results</a></td>
        <td><a href="{{url('/admin/surveys/delete/'.$survey->id)}}" role="button" class="btn btn-danger text-light">Delete survey</a></td>
    </tr>
    @endforeach
</table>
@endsection
