<div class="block block-bordered">
    <div class="block-content">

        @if($address->count() > 0)
            <ul class="block-options">
                <li>
                    <a href="{{ $management }}" type="radio" title="Перейти к управлению адресами">
                        <i class="si si-settings" style="color:red;"></i>
                    </a>
                </li>
            </ul>
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="30%">Адрес</th>
                    <th width="50%">Описание</th>
                    <th width="20%" class="text-center hidden-xs">Основной?</th>
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
                        <td class="text-center hidden-xs">
                            <a href="/backend/phones/main/{{ $a->id }}">
                                @if($a->is_main > 0)
                                    <i class="si si-check text-success"></i>
                                @else
                                    <i class="si si-close text-danger"></i>
                                @endif
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div>Нет записей. <a href="{{ $management }}">Добавить адрес?</a></div><div>&nbsp;</div>
        @endif
    </div>
</div>