<div class="block block-bordered">

    <div class="block-content">

        <table class="table table-condensed">
            <thead>
            <tr>
                <th width="45%">Тел. номер</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($phones) AND count($phones) > 0)
                @foreach($phones AS $phone)
                    <tr>
                        <td>
                            <a href="#" id="phone-{{ $phone->id }}" data-type="text" data-pk="{{ $phone->id }}" class="update" data-url="/backend/employee/update-phone">
                                {{ $phone->phone }}
                            </a>
                        </td>
                        <td>
                            <a href="#" id="description-{{ $phone->id }}" data-type="text" data-pk="{{ $phone->id }}" class="update" data-url="/backend/employee/update-phone">
                                {{ $phone->description }}
                            </a>

                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/employee/phone-destroy/{{ $phone->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>

                        </td>
                    </tr>
                @endforeach
            @endif

            <form action="/backend/employee/add-phone" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="employee_id" value="{{ $employee->id }}" />


                <tr>
                    <td>
                        <div class="form-group<?php if($errors->has('phone.number.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="phone[number][]"
                                       value="{{ old('phone.number.0') }}">
                                @if($errors->has('phone.number.0'))
                                    <div class="help-block">{{ $errors->first('phone.number.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group<?php if($errors->has('phone.name.0')): ?> has-error<?php endif; ?>">

                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="phone[name][]"
                                       value="{{ old('phone.name.0') }}">
                                @if($errors->has('phone.name.0'))
                                    <div class="help-block">{{ $errors->first('phone.name.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-group">
                            <div class="col-sm-12">


                                <button id="phone-add" href="#phone-line" class="phone-add btn btn-xs btn-default" type="submit">
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


