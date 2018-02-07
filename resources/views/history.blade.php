@extends('pattern.main')
@section('content')

        <br>
        <div class="input-field col s12">
            <select>
                    <option selected disabled>Choose date of parse</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
            </select>
            <label>History</label>
        </div>
        <div class="progress" style="display: none">
            <div class="indeterminate"></div>
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
        <a class="waves-effect waves-light btn"><i class="material-icons left">save</i>Save in .CSV</a>
        <a class="waves-effect waves-light btn"><i class="material-icons left">file_download</i>Download .CSV</a>

@endsection

@section('scripts')
@endsection