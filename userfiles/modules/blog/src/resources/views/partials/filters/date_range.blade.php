<?php
$randomId = uniqid();
?>

<div class="card-header">
    <a href="#" data-toggle="collapse" data-target="#collapse_{{$randomId}}" aria-expanded="true" class="">
        <h6 class="title">{{$filter->name}}</h6>
        <i class="fa fa-chevron-down" style="float:right;margin-top:-18px;"></i>
    </a>
</div>

<div class="collapse show" id="collapse_{{$randomId}}">
    <div class="card-body filter-max-scroll">

        <div id="js-filter-option-datepicker{{$randomId}}"></div>

        <script>
            filter.addDateRangePicker({
                id: 'js-filter-option-datepicker{{$randomId}}',
                filter: {!! json_encode($filter) !!},
            });
        </script>

    </div>
</div>
