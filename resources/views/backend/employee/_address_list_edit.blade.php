<div class="block block-bordered">
    <div class="block-content">

        <table class="table table-condensed">
            <thead>
            <tr>
                <th width="45%">Адрес</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($address) AND count($address) > 0)
                @foreach($address AS $a)
                    <tr>
                        <td>
                            <a href="#" id="name-{{ $a->id }}" data-type="text" data-pk="{{ $a->id }}" class="update"
                               data-url="/backend/employee/update-address">
                                {{ $a->name }}
                            </a>
                        </td>
                        <td>
                            <a href="#" id="description-{{ $a->id }}" data-type="text" data-pk="{{ $a->id }}" class="update"
                               data-url="/backend/employee/update-address">
                                {{ $a->description }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');"
                               href="/backend/employee/address-destroy/{{ $a->id }}" class="btn btn-xs btn-default"
                               type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i
                                        class="fa fa-times"></i></a>

                        </td>

                    </tr>
                @endforeach
            @endif

            <form action="/backend/employee/address-store/{{ $employee->id }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <tr>
                    <td>
                        <div class="form-group<?php if($errors->has('address.name.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="address[name][]"
                                       value="{{ old('address.name.0') }}">
                                @if($errors->has('address.name.0'))
                                    <div class="help-block">{{ $errors->first('address.name.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group<?php if($errors->has('address.description.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="address[description][]"
                                       value="{{ old('address.description.0') }}">
                                @if($errors->has('address.description.0'))
                                    <div class="help-block">{{ $errors->first('address.description.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-group">
                            <div class="col-sm-12">

                                <button href="#" class="btn btn-xs btn-default" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>


            </form>


            </tbody>
        </table>

    </div>
</div>


