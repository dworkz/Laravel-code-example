<div class="block block-bordered">
    <div class="block-content">

        @if(isset($phones) AND count($phones) > 0)
            <ul class="block-options">
                <li>
                    <a href="{{ $management }}" type="radio" title="Перейти к управлению телефонами">
                        <i class="si si-settings" style="color:red;"></i>
                    </a>
                </li>
            </ul>
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="30%">Номер</th>
                    <th width="50%">Описание</th>
                    <th width="20%" class="text-center hidden-xs">Основной?</th>
                </tr>
                </thead>
                <tbody>
                @foreach($phones AS $phone)
                    <tr>
                        <td>
                            {{ $phone->number }}
                        </td>
                        <td>
                            {{ $phone->name }}
                        </td>
                        <td class="text-center hidden-xs">
                            <a href="/backend/phones/main/{{ $phone->id }}">
                                @if($phone->is_main > 0)
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
            <div>Нет записей. <a href="{{ $management }}">Добавить телефон?</a></div><div>&nbsp;</div>
        @endif
    </div>
</div>