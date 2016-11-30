<div class="block block-bordered">
    <div class="block-content">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th width="45%">Название</th>
                <th width="45%">Документ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($docs) AND count($docs) > 0)
                @foreach($docs AS $doc)
                    <tr>
                        <td>
                            <a href="#" id="name-{{ $doc->id }}" data-type="text" data-pk="{{ $doc->id }}" class="update"
                               data-url="/backend/employee/update-docs">
                                {{ $doc->name }}
                            </a>
                        </td>
                        <td>
                            <a href="/{{ $doc->path_to_doc }}" target="_blank">
                                <i class="si si-doc"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');"
                               href="/backend/employee/docs-destroy/{{ $doc->id }}" class="btn btn-xs btn-default"
                               type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i
                                        class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif


            <form action="/backend/employee/docs-store/{{ $employee->id }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <tr>
                    <td>
                        <div class="form-group<?php if($errors->has('doc.name.0')): ?> has-error<?php endif; ?>">

                            <label class="col-xs-12">Название</label>

                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="doc[name][]" value="{{ old('doc.name.0') }}">
                                @if($errors->has('doc.name.0'))
                                    <div class="help-block">{{ $errors->first('doc.name.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group<?php if($errors->has('doc.path_to_doc.0')): ?> has-error<?php endif; ?>">

                            <label class="col-xs-12">Документ</label>

                            <div class="col-sm-12">
                                <input class="form-control" type="file" name="doc[path_to_doc][]" value="{{ old('doc.path_to_doc.0') }}">
                                @if($errors->has('doc.path_to_doc.0'))
                                    <div class="help-block">{{ $errors->first('doc.path_to_doc.0') }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-group">
                            <div class="col-sm-12">


                                <button class="btn btn-xs btn-default" type="submit">
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
