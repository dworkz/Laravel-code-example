@if(isset($docs) AND count($docs) > 0)
    <div class="block block-bordered">
        <div class="block-content">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="50%">Название</th>
                    <th width="50%">Документ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($docs AS $doc)
                    <tr>
                        <td>
                            {{ $doc->name }}
                        </td>
                        <td>
                            <a href="/{{ $doc->path_to_doc }}" target="_blank">
                                <i class="si si-doc"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif