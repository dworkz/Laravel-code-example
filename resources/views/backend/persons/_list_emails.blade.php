
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45%">Email</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
        </thead>
@if($emails->count() > 0)
        <tbody>
            @foreach($emails AS $email)
                <tr>
                    <td width="50%">
                        <a href="#" id="email-{{ $email->id }}" data-type="text" data-pk="{{ $email->id }}" class="email" data-url="/backend/company/update-email">
                            {{ $email->email }}
                        </a>
                    </td>
                    <td width="50%">
                        <a href="#" id="name-{{ $email->id }}" data-type="text" data-pk="{{ $email->id }}" class="email" data-url="/backend/company/update-email">
                            {{ $email->name }}
                        </a>
                    </td>
                    <td class="text-center">
                        @if( ! $view)
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/emails/destroy/{{ $email->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
@endif

            @if( ! $view)
                <form action="/backend/emails/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="company_id" value="{{ $person->company_id }}" />
                    <input type="hidden" name="person_id" value="{{ $person->id }}" />

                    <tr>
                        <td width="50%">
                            <div class="form-group<?php if($errors->has('email.0')): ?> has-error<?php endif; ?>">

                                <div class="col-sm-12">
                                    <input class="form-control input-sm" type="text" name="email[]" value="" placeholder="Email">
                                    @if($errors->has('email.0'))
                                        <div class="help-block">{{ $errors->first('email.0') }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td width="50%">
                            <div class="form-group<?php if($errors->has('name.0')): ?> has-error<?php endif; ?>">



                                <div class="col-sm-12">
                                    <input class="form-control input-sm" type="text" name="name[]" value="" placeholder="Описание">
                                    @if($errors->has('name.0'))
                                        <div class="help-block">{{ $errors->first('name.0') }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="text-center text-middle">
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


