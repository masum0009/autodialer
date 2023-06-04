<style>
.hidden{
    display: none !important;
}
</style>
<div class="pt-3" onclick="this.classList.add('hidden');">
    <div style="font-size: 16px;" class="alert alert-danger" role="alert">
        <?= $message ?> <i style="cursor: pointer;" class="float-right fa fa-times"></i>
    </div>
</div>