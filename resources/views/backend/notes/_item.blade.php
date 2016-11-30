<div class="block">

    <div class="block-content block-content-narrow">


        <div class="row">

            <div class="col-xs-8">
                <p class="h2 font-w400 push-5">{{ $item->name }}</p>
                <p>
                    Кем создана: <strong>{{ with(new NoteHelper())->employee($item->employee_id) }}</strong><br />
                    Дата создания: <strong>{{ $item->created_at }}</strong><br />
                    Статус: <strong><?php if($item->is_accepted > 0) { echo '<span style="color:green;">Одобрена.</span>'; } else { echo '<span style="color:red;">Не одобрена.</span>'; } ?></strong><br />
                    @if($item->is_accepted > 0)
                        Дата одобрения: <strong>{{ $item->accepted_date }}</strong><br />
                    @endif

                    @if($item->is_archive > 0)
                        <strong style="color:red;">Архив</strong><br />
                    @endif
                </p>

                @if($item->description != '')
                    <p>{{ $item->description }}</p>
                @endif

            </div>

            <div class="col-xs-4 text-right">

                <a href="/backend/note/update/{{ $parent_id }}/{{ $item->id }}" class="btn btn-success" type="button">
                    Изменить
                </a>

            </div>

        </div>


        <!-- Table -->
        <div class="table-responsive push-50">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Наименование товара (услуги)</th>
                    <th class="text-center" style="width: 100px;">Кол-во</th>
                    <th class="text-right" style="width: 100px;">Ед. изм.</th>
                    <th class="text-right" style="width: 100px;">Цена</th>
                    <th class="text-right" style="width: 120px;">Сумма</th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>

                @foreach($products AS $product)
                    <?php
                        $subtotal = $product->qty * $product->price;
                        $total += $subtotal;
                    ?>
                    <tr>

                        <td>
                            <p class="font-w600 push-10">{{ $product->name }}</p>

                        </td>
                        <td class="text-center">{{ $product->qty }}</td>
                        <td class="text-right">{{ $product->unit }}</td>
                        <td class="text-right">{{ $product->price }}</td>
                        <td class="text-right">{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach

                <tr class="active">
                    <td colspan="4" class="font-w700 text-uppercase text-right">Всего:</td>
                    <td class="font-w700 text-right">{{ number_format($total, 2) }}</td>

                </tr>
                </tbody>
            </table>

            <hr />

            @if(count($docs) > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>

                        <th>Документ</th>
                        <th>Описание</th>
                        <th>Просмотр</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($docs AS $doc)
                        <tr>
                            <td>
                                {{ $doc->name }}
                            </td>
                            <td>
                                {{ $doc->description }}
                            </td>
                            <td class="text-center">
                                <a href="/{{ $doc->path_to_doc }}" target="_blank">
                                    <i class="si si-doc"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>
</div>