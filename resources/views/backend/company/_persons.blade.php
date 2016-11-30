@if($persons->count() > 0)

    @foreach($persons AS $p)
        <div class="block block-bordered">
            <div class="block-content">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td width="15%">ФИО</td>
                        <td>
                            <a href="#" id="fio-{{ $p->id }}" data-type="text" data-pk="{{ $p->id }}" class="person" data-url="/backend/company/update-person">
                                {{ $p->fio }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%">Должность</td>
                        <td>
                            <a href="#" id="position-{{ $p->id }}" data-type="text" data-pk="{{ $p->id }}" class="person" data-url="/backend/company/update-person">
                                {{ $p->position }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%">Телефоны</td>
                        <td>
                            {!! with(new CompanyHelper)->personPhoneView($p->id, $p, $view) !!}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%">Emails</td>
                        <td>
                            {!! with(new CompanyHelper)->personEmailView($p->id, $p, $view) !!}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%">Адреса</td>
                        <td>
                            {!! with(new CompanyHelper)->personAddressView($p->id, $p, $view) !!}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%">Документы</td>
                        <td>
                            {!! with(new CompanyHelper)->personDocView($p->id, $p, $view) !!}
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    @endforeach

@endif

@if( ! $view)

    <div class="content">

        <div class="block">

            <div class="block-content">

                <h3>Добавить сотрудника</h3>

                <form enctype="multipart/form-data" class="form-horizontal push-10-t" action="/backend/persons/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="company_id" value="{{ $company->id }}" />


                    @include('backend.company._add_person', [
                        'number_person_form' => 0,
                        'number_person_form_count' => 0,
                        'edit_company' => TRUE
                    ])


                    <div class="form-group">
                        <div class="col-sm-9">
                            <button class="btn btn-sm btn-primary" type="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endif
