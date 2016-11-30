<div class="block block-bordered">
    <div class="block-content">

        @if($docs->count() > 0)
            <ul class="block-options">
                <li>
                    <a href="{{ $management }}" type="radio" title="Перейти к управлению документами">
                        <i class="si si-settings" style="color:red;"></i>
                    </a>
                </li>
            </ul>
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="30%">Название</th>
                    <th width="50%" class="hidden-xs">Описание</th>
                    <th width="20%" class="text-center">Ссылка</th>
                </tr>
                </thead>
                <tbody>
                @foreach($docs AS $doc)
                    <tr>
                        <td>
                            {{ $doc->name }}
                        </td>
                        <td class="hidden-xs">
                            {{ $doc->description }}
                        </td>
                        <td class="text-center">
                            <a href="/{{ $doc->path_to_doc }}" target="_blank">
                                <i class="si si-doc"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div>Нет записей. <a href="{{ $management }}">Добавить документ?</a></div><div>&nbsp;</div>
        @endif
    </div>
</div>