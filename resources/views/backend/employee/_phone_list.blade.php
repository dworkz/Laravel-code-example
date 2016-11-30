@if(isset($phones) AND count($phones) > 0)

    <div class="block block-bordered">
        <div class="block-content">

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="50%">Номер</th>
                    <th width="50%">Описание</th><th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($phones AS $phone)
                    <tr>
                        <td>
                            {{ $phone->phone }}
                        </td>
                        <td>
                            {{ $phone->description }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endif