
<nav aria-label="breadcrumb">
    <ol class="breadcrumb form-control mt-4">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark fas fa-home" href="javascript:;"></a></li>
        <li class="breadcrumb-item text-sm">CRUD</li>
        <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', '
            ', Request::path()) }}</li>
    </ol>
</nav>