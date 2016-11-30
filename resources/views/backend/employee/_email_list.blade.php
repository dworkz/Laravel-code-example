@if(isset($email) AND count($email) > 0)

    <div class="block block-bordered">

        <div class="block-content">

            <table class="table table-condensed">
                <thead>
                <tr>

                    <th with="50%">Email</th>
                    <th width="50%">Описание</th>

                </tr>
                </thead>
                <tbody>
                @foreach($email AS $e)
                    <tr>
                        <td>
                            {{ $e->email }}
                        </td>
                        <td>
                            {{ $e->description }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endif