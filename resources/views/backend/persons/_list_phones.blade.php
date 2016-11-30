
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45%">Номер</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
        @if($phones->count() > 0)
            @foreach($phones AS $phone)
                <tr>
                    <td width="50%">
                        <a href="#" id="number-{{ $phone->id }}" data-type="text" data-pk="{{ $phone->id }}" class="phone" data-url="/backend/company/update-phone">
                            {{ $phone->number }}
                        </a>
                    </td>
                    <td width="50%">
                        <a href="#" id="name-{{ $phone->id }}" data-type="text" data-pk="{{ $phone->id }}" class="phone" data-url="/backend/company/update-phone">
                            {{ $phone->name }}
                        </a>
                    </td>
                    <td class="text-center">
                        @if( ! $view)
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/phones/destroy/{{ $phone->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif

        @if( ! $view)


            <form action="/backend/phones/store" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="company_id" value="{{ $person->company_id }}" />
                <input type="hidden" name="person_id" value="{{ $person->id }}" />


                <tr>
                    <td>
                        <div class="form-group<?php if($errors->has('number.0')): ?> has-error<?php endif; ?>">


                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="number[]" value="" placeholder="Номер">
                                @if($errors->has('number.0'))
                                    <div class="help-block">{{ $errors->first('number.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group<?php if($errors->has('name.0')): ?> has-error<?php endif; ?>">



                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="name[]" value="" placeholder="Описание">
                                @if($errors->has('name.0'))
                                    <div class="help-block">{{ $errors->first('name.0') }}</div>
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


