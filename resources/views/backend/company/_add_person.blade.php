

        <div class="col-sm-12" id="person-{{ $number_person_form }}-block">
            <div class="block block-bordered">
                <div class="block-content">

            <div class="row">

                <div class="col-sm-5">

                    <div class="form-group<?php if($errors->has('person.fio.' . $number_person_form)): ?> has-error<?php endif; ?>">

                            <label class="col-xs-12">ФИО сотрудника</label>

                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="person[fio][]" value="{{ old('person.fio.' . $number_person_form) }}">
                            @if($errors->has('person.fio.' . $number_person_form))
                                <div class="help-block">{{ $errors->first('person.fio.' . $number_person_form) }}</div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-sm-5">

                    <div class="form-group<?php if($errors->has('person.position.' . $number_person_form)): ?> has-error<?php endif; ?>">

                            <label class="col-xs-12">Должность</label>

                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="person[position][]" value="{{ old('person.position.' . $number_person_form) }}">
                            @if($errors->has('person.position.' . $number_person_form))
                                <div class="help-block">{{ $errors->first('person.position.' . $number_person_form) }}</div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-sm-2 text-center">

@if( ! isset($edit_company) )
                    @if($number_person_form === 0)

                        <div class="form-group">
                            <label class="col-xs-12" for="">&nbsp;</label>
                            <div class="col-sm-12">
                                <a id="person-add" data-rows="{{ $number_person_form_count }}" href="#persons-line" class="btn btn-success" type="button">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="col-xs-12" for="">&nbsp;</label>
                            <div class="col-sm-12">
                                <a id="person-{{ $number_person_form }}" href="#persons-line" class="person-minus btn btn-warning" type="button"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>

                    @endif
@endif
                </div>

            </div>

                    @if(count(Request::old('person.phone.name')) > 0)
                        @for ($e = 0; $e < count(Request::old('person.phone.number')); $e++)
                            @include('backend.company._add_person_phone', [
                                'number_person_form' => $number_person_form,
                                'phone_number_form' => $e,
                                'phone_number_form_count' => count(Request::old('person.phone.number')
                            )])
                        @endfor
                    @else
                        @include('backend.company._add_person_phone', [
                            'number_person_form' => $number_person_form,
                            'phone_number_form' => 0,
                            'phone_number_form_count' => 0
                        ])
                    @endif

                    <hr id="phone-line-{{ $number_person_form }}" name="phone-line-{{ $number_person_form }}" />


                    @if(count(Request::old('person.email.name')) > 0)
                        @for ($e = 0; $e < count(Request::old('person.email.email')); $e++)
                            @include('backend.company._add_person_email', [
                                'number_person_form' => $number_person_form,
                                'email_number_form' => $e,
                                'email_number_form_count' => count(Request::old('person.email.name')
                            )])
                        @endfor
                    @else
                        @include('backend.company._add_person_email', [
                            'number_person_form' => $number_person_form,
                            'email_number_form' => 0,
                            'email_number_form_count' => 0
                        ])
                    @endif

                    <hr id="email-line-{{ $number_person_form }}" name="email-line-{{ $number_person_form }}" />

                    @if(count(Request::old('person.address.name')) > 0)
                        @for ($e = 0; $e < count(Request::old('person.address.name')); $e++)
                            @include('backend.company._add_person_address', [
                                'number_person_form' => $number_person_form,
                                'address_number_form' => $e,
                                'address_number_form_count' => count(Request::old('person.address.name')
                            )])
                        @endfor
                    @else
                        @include('backend.company._add_person_address', [
                            'number_person_form' => $number_person_form,
                            'address_number_form' => 0,
                            'address_number_form_count' => 0
                        ])
                    @endif

                    <hr id="address-line-{{ $number_person_form }}" name="address-line-{{ $number_person_form }}" />

                    @if(count(Request::old('person.doc.name')) > 0)
                        @for ($e = 0; $e < count(Request::old('person.doc.name')); $e++)
                            @include('backend.company._add_person_doc', [
                                'number_person_form' => $number_person_form,
                                'doc_number_form' => $e,
                                'doc_number_form_count' => count(Request::old('person.doc.name')
                            )])
                        @endfor
                    @else
                        @include('backend.company._add_person_doc', [
                            'number_person_form' => $number_person_form,
                            'doc_number_form' => 0,
                            'doc_number_form_count' => 0
                        ])
                    @endif

                    <hr id="doc-line-{{ $number_person_form }}" name="doc-line-{{ $number_person_form }}" />

                </div> <!-- end block-content -->
            </div> <!-- end block block-bordered -->
        </div>