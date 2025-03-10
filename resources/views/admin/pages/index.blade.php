@extends('layouts.admin')
@section('content')
@can('page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.page.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.page.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Page">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.home_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.about_us_header') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.mission_header') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.vision_header') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.booking_title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $key => $page)
                        <tr data-entry-id="{{ $page->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $page->id ?? '' }}
                            </td>
                            <td>
                                {{ $page->home_title ?? '' }}
                            </td>
                            <td>
                                {{ $page->about_us_header ?? '' }}
                            </td>
                            <td>
                                {{ $page->mission_header ?? '' }}
                            </td>
                            <td>
                                {{ $page->vision_header ?? '' }}
                            </td>
                            <td>
                                {{ $page->booking_title ?? '' }}
                            </td>
                            <td>

                                @can('page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pages.edit', $page->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Page:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
