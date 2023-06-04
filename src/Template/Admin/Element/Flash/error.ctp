<style>
.hidden{
    display: none !important;
}
</style>
<div onclick="this.classList.add('hidden');" class="alert alert-danger" role="alert">
    <?= $message ?> <i style="cursor: pointer;" class="float-right fa fa-times"></i>
</div>
