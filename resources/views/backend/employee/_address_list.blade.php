@if(isset($address) AND count($address) > 0)
    <div class="block block-bordered">
        <div class="block-content">

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="50%">Адрес</th>
                    <th width="50%">Описание</th>

                </tr>
                </thead>
                <tbody>
                @foreach($address AS $a)
                    <tr>
                        <td>
                            {{ $a->name }}
                        </td>
                        <td>
                            {{ $a->description }}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endif

