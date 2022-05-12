<script type="text/javascript">
<?php foreach ($alerts as $alert): ?>
<?php [$class, $content] = $alert; ?>
    toastr.<?= $class ?>("<?= $content ?>");
<?php endforeach; ?>
</script>