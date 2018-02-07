@extends('pattern.main')
@section('content')

        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="col s12">
                        You can do input limit for parsing:
                        <div class="input-field inline">
                            <input id="limit-for-parsing" type="number" class="validate">
                            <label for="limit-for-parsing" data-error="wrong" data-success="right">limit...</label>
                        </div>
                        <a class="waves-effect waves-light btn #81c784 green lighten-2"><i class="material-icons left">play_arrow</i>Start parsing</a>
                        <a class="waves-effect waves-light btn"><i class="material-icons left">remove_circle</i>Clear result</a>
                    </div>
                </div>
            </form>
            <div class="progress" style="display: none">
                <div class="indeterminate"></div>
            </div>
        </div>

        <div id="result">
            <table class="highlight">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Дата/час порсингу</th>
                    <th>Дата/час новини</th>
                    <th>Заголовок</th>
                    <th>Медіа контент</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                    <td>$0.87</td>
                    <td>$0.87</td>
                    <td>$0.87</td>
                </tr>
                </tbody>
            </table>
        </div>
        <a class="waves-effect waves-light btn"><i class="material-icons left">cloud_upload</i>Save in DB</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">save</i>Save in .CSV</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">file_download</i>Download .CSV</a>


@endsection

@section('scripts')
@endsection