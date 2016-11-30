
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="45%">Название</th>
                <th width="45%">Документ</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
        @if($docs->count() > 0)
            @foreach($docs AS $doc)
                <tr>
                    <td width="50%">
                        <a href="#" id="name-{{ $doc->id }}" data-type="text" data-pk="{{ $doc->id }}" class="doc" data-url="/backend/company/update-doc">
                            {{ $doc->name }}
                        </a>
                    </td>
                    <td width="50%">
                        <a href="/{{ $doc->path_to_doc }}" target="_blank">
                            <i class="si si-doc"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        @if( ! $view)
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/docs/destroy/{{ $doc->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif

        @if( ! $view)
            <form action="/backend/docs/store" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="company_id" value="{{ $person->company_id }}" />
                <input type="hidden" name="person_id" value="{{ $person->id }}" />


                <tr>
                    <td width="50%">
                        <div class="form-group<?php if($errors->has('doc.name.0')): ?> has-error<?php endif; ?>">
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="text" name="doc[name][]" value="" placeholder="Название">
                                @if($errors->has('doc.name.0'))
                                    <div class="help-block">{{ $errors->first('doc.name.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td width="50%">
                        <div class="form-group<?php if($errors->has('doc.path_to_doc.0')): ?> has-error<?php endif; ?>">



                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="file" name="doc[path_to_doc][]" placeholder="Документ">
                                @if($errors->has('doc.path_to_doc.0'))
                                    <div class="help-block">{{ $errors->first('doc.path_to_doc.0') }}</div>
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


