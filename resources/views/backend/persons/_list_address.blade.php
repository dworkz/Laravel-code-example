
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45%">Адрес</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
        @if($address->count() > 0)
            @foreach($address AS $addr)
                <tr>
                    <td width="50%">
                        <a href="#" id="name-{{ $addr->id }}" data-type="text" data-pk="{{ $addr->id }}" class="address" data-url="/backend/company/update-address">
                            {{ $addr->name }}
                        </a>
                    </td>
                    <td width="50%">
                        <a href="#" id="description-{{ $addr->id }}" data-type="text" data-pk="{{ $addr->id }}" class="address" data-url="/backend/company/update-address">
                            {{ $addr->description }}
                        </a>
                    </td>
                    <td class="text-center">
                        @if( ! $view)
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/address/destroy/{{ $addr->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif

        @if( ! $view)
            <form action="/backend/address/store" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="company_id" value="{{ $person->company_id }}" />
                <input type="hidden" name="person_id" value="{{ $person->id }}" />

                <tr>
                    <td width="50%">
                        <div class="form-group<?php if($errors->has('address.name.0')): ?> has-error<?php endif; ?>">

                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="address[name][]" value="" placeholder="Адрес">
                                @if($errors->has('address.name.0'))
                                    <div class="help-block">{{ $errors->first('address.name.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td width="50%">
                        <div class="form-group<?php if($errors->has('address.description.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="address[description][]" value="" placeholder="Название">
                                @if($errors->has('address.description.0'))
                                    <div class="help-block">{{ $errors->first('address.description.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-xs btn-default" type="submit"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>

            </form>
        @endif

        </tbody>
    </table>


