<div class="block block-bordered">

    <div class="block-content">

        <table class="table table-condensed">
            <thead>
            <tr>

                <th with="45%">Email</th>
                <th width="45%">Описание</th>
                <th width="10%"></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($email) AND count($email) > 0)
                @foreach($email AS $e)
                    <tr>
                        <td>
                            <a href="#" id="email-{{ $e->id }}" data-type="text" data-pk="{{ $e->id }}" class="update"
                               data-url="/backend/employee/update-email">
                                {{ $e->email }}
                            </a>

                        </td>
                        <td>
                            <a href="#" id="description-{{ $e->id }}" data-type="text" data-pk="{{ $e->id }}"
                               class="update" data-url="/backend/employee/update-email">
                                {{ $e->description }}
                            </a>

                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');"
                               href="/backend/employee/email-destroy/{{ $e->id }}" class="btn btn-xs btn-default"
                               type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i
                                        class="fa fa-times"></i></a>

                        </td>
                    </tr>
                @endforeach
            @endif


            <form action="/backend/employee/email-store/{{ $employee->id }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <tr>
                    <td>
                        <div class="form-group<?php if($errors->has('email.email.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="email[email][]"
                                       value="{{ old('email.email.0') }}">
                                @if($errors->has('email.email.0'))
                                    <div class="help-block">{{ $errors->first('email.email.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group<?php if($errors->has('email.description.0')): ?> has-error<?php endif; ?>">

                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="email[description][]"
                                       value="{{ old('email.description.0') }}">
                                @if($errors->has('email.description.0'))
                                    <div class="help-block">{{ $errors->first('email.description.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-group">
                            <div class="col-sm-12">


                                <button id="email-add" href="#email-line" class="email-add btn btn-xs btn-default" type="submit">
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

